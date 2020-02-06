<?php

namespace App\Jobs\EsoImport;

use App\Enum\BagType;
use App\Enum\Import\ItemPosition;
use App\Jobs\ItemSlugs;
use App\Model\Character;
use App\Model\Item;
use App\Model\ItemStyle;
use App\Model\UserItem;
use App\Repository\ItemRepository;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class Items implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $lines;
    private $user_id;
    private $importGroup_id;

    private $userItemsChunk = 750;
    private $itemsChunk = 1500;

    private $lang;
    /**
     * @var ItemRepository
     */
    private $itemRepository;
    private $orderedLines;
    private $itemStyles;
    private $characters;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($lines, $user_id, $importGroup_id = null)
    {
        $this->lines = $lines;
        $this->user_id = $user_id;
        $this->importGroup_id = $importGroup_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        set_time_limit(120);
        $this->lang = App::getLocale();
        $this->itemRepository = new ItemRepository(false);
        $this->itemStyles = ItemStyle::all();
        $this->characters = Character::where('userId', $this->user_id)->get();

        $this->orderedLines = collect();
        foreach ($this->lines as $id => $line) {
            $line = substr($line, stripos($line, 'ITEM:') + 5);
            $data = explode(';', $line);
            $data['item_id'] = null;
            $data['userItem_id'] = null;
            $data['arr_key'] = $id;

            $lang = App::getLocale();
            if (isset($data[ItemPosition::LANG])) {
                $lang = explode('"', $data[ItemPosition::LANG])[0];
            }
            $this->lang = $lang;
            $this->orderedLines->put($data['arr_key'], $data);
        }

        $this->matchItems();
        $this->createItems();
        $this->matchItems();

        $this->matchUserItems();
        $this->createUserItems();
        $this->updateUserItems();

        $itemSlugs = new ItemSlugs();
        dispatch($itemSlugs);
    }

    private function updateUserItems()
    {
        foreach ($this->orderedLines->where('userItem_id', '!=', null) as $data) {
            $newUi = $this->itemRepository->userItem($data, $this->user_id, $this->itemStyles, $this->characters);
            $newUi->id = $data['userItem_id'];
            $newUi->exists = true;
            $newUi->updated_at = Carbon::now();
            $newUi->save();
        }
    }

    private function createUserItems()
    {
        $inserts = collect();

        foreach ($this->orderedLines->where('item_id', '!=', null)->where('userItem_id', null) as $key => $data) {
            $userItem = $this->itemRepository->userItem($data, $this->user_id, $this->itemStyles, $this->characters);
            $inserts->push($userItem);
        }

        if ($inserts->count() > 0) {
            UserItem::insert($inserts->toArray());
        }
    }

    private function matchUserItems()
    {
        UserItem::where('userId', $this->user_id)->chunk($this->userItemsChunk, function ($userItems) {
            $userItems = $userItems->groupBy('itemId');

            foreach ($this->orderedLines->where('item_id', '!=', null)->where('userItem_id', null) as $key => $line) {
                $bagType = $line[ItemPosition::BAGTYPE];

                $character = $this->characters
                    ->where('externalId', intval($line[ItemPosition::CHARACTER_EXTERNAL_ID]))
                    ->first();

                if (isset($bagType) and $bagType === BagType::BANK) {
                    $character = null;
                }

                if (isset($bagType) and $bagType == BagType::VIRTUAL) {
                    $character = null;
                }

                $userItemsPerItemId = $userItems->get($line['item_id']);
                $userItem = null;

                if (! is_null($userItemsPerItemId)) {
                    $userItem = $userItemsPerItemId->where('characterId', $character ? $character->id : null)
                        ->where('bagEnum', $bagType)
                        ->where('uniqueId', $line[ItemPosition::UNIQUE_ID])
                        ->first();
                }

                if (! is_null($userItem)) {
                    $line['userItem_id'] = $userItem->id;
                    $this->orderedLines->put($line['arr_key'], $line);
                }
            }
        });
    }

    private function createItems()
    {
        $new_items = collect();
        foreach ($this->orderedLines->where('item_id', null) as $data) {
            $new_items->push($this->itemRepository->create($data, $this->itemStyles));
        }

        Item::insert($new_items->toArray());
    }

    private function updateFlavor($data, $item)
    {
        if ($item->flavor != null) {
            return true;
        }

        if (! isset($data[29])) {
            return true;
        }

        if ($data[29] == '') {
            return true;
        }

        $item->flavor = $data[29];
        $item->save();
    }

    private function matchItems()
    {
        $lines = $this->orderedLines;
        $names = $lines->where('item_id', null)->pluck(ItemPosition::NAME);

        Item::whereIn('external_id', $names)

            ->where('lang', $this->lang)
            ->orderBy('external_id')
            ->chunk($this->itemsChunk, function ($items) use ($lines) {
                $itemsGrouped = $items->groupBy('external_id');

                foreach ($lines as $id => $line) {
                    $external_id = $line[ItemPosition::NAME];
                    $item = null;

                    if ($itemsGrouped->has($external_id)) {
                        $item = $this->itemRepository->importGet($line, $itemsGrouped->get($external_id));
                    }

                    if (! is_null($item)) {
                        $line['item_id'] = $item->id;
                        $this->updateFlavor($line, $item);
                        $this->orderedLines->put($line['arr_key'], $line + ['item_id' => $item->id]);
                    }
                }
            });
    }
}
