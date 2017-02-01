<?php namespace App\Jobs\EsoImport;

use App\Enum\BagType;
use App\Enum\ImportType;
use App\Model\ImportRow;
use App\Model\ItemStyle;
use App\Model\UserItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Item implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $import_guid;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($line, $user, $importGroup)
    {
        $import = new ImportRow();
        $import->guid = sha1($line);
        $import->user_id = $user->id;
        $import->import_group_guid = $importGroup;
        $import->type = ImportType::ITEM;
        $import->row = trim($line);
        $import->save();

        $this->import_guid = $import->guid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $import = ImportRow::findOrFail($this->import_guid);

        $item_start = stripos($import->row, 'ITEM:');
        $line = str_ireplace('",', '', $import->row);
        $line = substr($line, $item_start + 5);

        $properties = explode(';', $line);

        $bagType = isset($properties[15]) ? intval($properties[15]) : null;

        $character = $import->user->characters->where('externalId', intval($properties[14]))->first();

        if(isset($bagType) and $bagType === BagType::BANK) {
            $character = null;
        }

        if(isset($properties[23])) {

            $item = \App\Model\Item::where('name', trim($properties[1]))
                ->where('trait', intval($properties[2]))
                ->where('quality', intval($properties[5]))
                ->where('equipType', intval($properties[3]))
                ->where('armorType', intval($properties[6]))
                ->where('type', intval($properties[10]))
                ->where('weaponType', intval($properties[13]))
                ->where('enchant', trim($properties[8]))
                ->where('icon', trim($properties[9]))
                ->where('itemValue', intval($properties[22]))
                ->where('level', intval($properties[12]))
                ->where('championLevel', intval($properties[11]))
                ->where('lang', isset($properties[26]) ? trim(preg_replace('/\s\s+/', ' ', $properties[26])) : config('constants.default-language'))
                ->first();

            if(!$item) {
                $item = new \App\Model\Item();
                $item->uniqueId = $properties[0];
                $item->name = trim($properties[1]);
                $item->equipType = intval($properties[3]);
                $item->armorType = intval($properties[6]);
                $item->quality = intval($properties[5]);
                $item->icon = trim($properties[9]);
                $item->type = intval($properties[10]);
                $item->championLevel = intval($properties[11]);
                $item->level = intval($properties[12]);
                $item->weaponType = intval($properties[13]);
                $item->itemLink = $properties[19];
                $item->trait = $properties[2];
                $item->traitDescription = $properties[21];
                $item->enchant = trim($properties[8]);
                $item->enchantDescription = $properties[20];
                $item->itemValue = intval($properties[22]);

                if(!empty($properties[4])) {
                    $item->setItemSet($properties[4]);
                }

                if(isset($properties[25]) and intval($properties[25]) != 0) {
                    $itemStyle = ItemStyle::where('externalId', intval($properties[25]))->first();
                    if(is_null($itemStyle)) {
                        $itemStyle = new ItemStyle();
                        $itemStyle->externalId = intval($properties[25]);
                        $itemStyle->name = '';
                        $itemStyle->image = '';
                        $itemStyle->save();
                    }
                    $item->itemStyleId = isset($itemStyle->id) ? $itemStyle->id : null;
                }

                $item->save();
            }

            if($item) {
                $userItem = new UserItem();
                $userItem->userId = $import->user->id;
                $userItem->itemId = $item->id;
                $userItem->characterId = $character ? $character->id : null;
                $userItem->uniqueId = $properties[0];
                $userItem->traitEnum = $properties[2];
                $userItem->traitDescription = $properties[21];
                $userItem->isJunk = $properties[18] == 'true';
                $userItem->enchant = $properties[8];
                $userItem->enchantDescription = $properties[20];
                $userItem->bagEnum = $bagType;
                $userItem->slotId = intval($properties[23]);

                if(isset($properties[25]) and intval($properties[25]) != 0) {
                    $itemStyle = ItemStyle::where('externalId', intval($properties[25]))->first();
                    $userItem->itemStyleId = isset($itemStyle->id) ? $itemStyle->id : null;
                }

                $userItem->equipTypeEnum = $properties[3];
                $userItem->armorTypeEnum = $properties[6];
                $userItem->weaponTypeEnum = intval($properties[13]);
                $userItem->itemTypeEnum = intval($properties[10]);
                $userItem->count = intval($properties[17]);

                $userItem->isBound = (isset($properties[16]) and stripos($properties[16], 'true') !== false);
                $userItem->isLocked = $properties[7] == 'true';

                $userItem->save();

            }
        }

        $import->delete();
    }

}
