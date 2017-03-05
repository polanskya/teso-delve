<?php namespace HeppyKarlsson\EsoImport\Import\Jobs\Inventory;

use App\Model\ImportRow;
use App\Model\ItemStyle;
use App\User;
use HeppyKarlsson\EsoImport\Import\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Items extends InventoryJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;
    protected $importGroup_guid;
    protected $item_guids;

    public function __construct($user_id, $importGroup_guid, $item_guids)
    {
        $this->user_id = $user_id;
        $this->importGroup_guid = $importGroup_guid;
        $this->item_guids = $item_guids;
    }

    public function handle()
    {
        $importRows = ImportRow::whereIn('guid', $this->item_guids)->get();

        $itemImport = new Item();
        $user = User::find($this->user_id);
        $itemStyles = ItemStyle::all();

        foreach($importRows as $importRow) {
            $itemImport->process($importRow->row, $user, $itemStyles);

        }

        ImportRow::whereIn('guid', $this->item_guids)->delete();

        $this->DoneCheck();
        return true;
    }

}
