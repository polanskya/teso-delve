<?php namespace HeppyKarlsson\MMImport;

use App\Model\ImportRow;
use App\Model\ItemSale;
use App\Model\ItemStyle;
use App\User;
use Carbon\Carbon;
use HeppyKarlsson\EsoImport\Import\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class Sales implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $sales;

    public function __construct($sales)
    {
        $this->sales = $sales;
    }

    public function handle()
    {
        $inserts = [];
        $guids = [];
        foreach ($this->sales as $sale) {
            set_time_limit(10);

            $itemKey = explode(':', $sale['item_key']);
            $query = \App\Model\Item::where('itemLink', 'LIKE', '|H0:item:'.$sale['link_id'].":%")
                ->where('itemLink', 'LIKE', '%:'.$itemKey[4].'|h|h')
                ->where('level', $itemKey[0])
                ->where('championLevel', $itemKey[1] * 10)
                ->where('quality', $itemKey[2])
                ->where('trait', $itemKey[3]);

            $item = $query->first();

            if(is_null($item)) {
                continue;
            }

            $itemSale = new ItemSale();
            $itemSale->item_id = $item->id;
            $itemSale->price = $sale['price'];
            $itemSale->price_ea = $sale['price'] / $sale['quant'];
            $itemSale->external_id = $sale['id'];
            $itemSale->link_id = $sale['link_id'];

            $itemSale->level = $itemKey[0];
            $itemSale->championLevel = $itemKey[1] * 10;
            $itemSale->quality = $itemKey[2];
            $itemSale->trait = $itemKey[3];
            $itemSale->itemLink_last = $itemKey[4];


            $itemSale->quantity = $sale['quant'];
            $itemSale->sold_at = Carbon::createFromTimestamp($sale['timestamp']);
            $itemSale->buyer = $sale['buyer'];
            $itemSale->item_key = $sale['item_key'];
            $itemSale->seller = $sale['seller'];
            $itemSale->itemLink = $sale['itemLink'];
            $itemSale->isKiosk = $sale['wasKiosk'];
            $itemSale->guid();

            $guids[] = $itemSale->guid;
            $inserts[$itemSale->guid] = $itemSale->getAttributes();
        }

        $used_guids = ItemSale::whereIn('guid', $guids)->select('guid')->get();
        $used_guids = $used_guids->keyBy('guid')->toArray();

        $inserts = array_diff_key($inserts, $used_guids);

        if(count($inserts) == 0) {
            return true;
        }

        ItemSale::insert($inserts);

        return true;
    }

    /*
     * SELECT I.id, itemSale.* FROM item_sales AS itemSale

LEFT JOIN items AS I
	ON itemSale.level=I.level
	AND itemSale.championLevel=I.championLevel
	AND itemSale.quality=I.quality
	AND itemSale.trait=I.trait
	AND I.itemLink LIKE CONCAT('|H0:item:', itemSale.link_id, ':%')
	and I.itemLink LIKE CONCAT('%:', itemSale.itemLink_last, '|h|h')

WHERE item_id IS NULL

LIMIT 1000
     */

}