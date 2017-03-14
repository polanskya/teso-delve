<?php namespace App\Http\Controllers;


use App\Model\Dungeon;
use App\Model\Item;
use App\Model\ItemSale;
use App\Model\ItemStyleChapter;
use App\Model\Set;
use App\Model\ZoneSet;
use App\Objects\Zones;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController
{

    public function index() {

    }

    public function show(Item $item) {
        $user = Auth::user();
        $items = new Collection();

        if($user) {
            $userItems = $user->items()->where('itemId', $item->id)->get();
            if ($userItems) {
                $item = $userItems->first();

                $item->pivot->count = $userItems->pluck('pivot')->sum('count');
            }

            $favourites = $user->favouriteSets
                ->pluck('setId')
                ->toArray();

            $items = $user->items
                ->where('setId', $item->setId);
        }

        $item->load('set.bonuses');
        $set = $item->set;

        $sales = ItemSale::where('item_id', $item->id)
            ->where('sold_at', '>=', Carbon::now()->subMonth())
            ->select(DB::raw('avg(price_ea) as price_avg, max(price_ea) as price_max, min(price_ea) as price_min, count(*) as hits'))
            ->get(['price_avg', 'price_max', 'price_min', 'hits'])
            ->first()
            ->getAttributes();

        return view('item.show', compact('item', 'favourites', 'items', 'set', 'sales'));
    }

    public function ajaxShow(Item $item) {
        $set = $item->set;
        $items = new Collection();
        $itemStyleChapter = ItemStyleChapter::where('itemId', $item->id)->first();

        $user = Auth::user();
        if($user) {
            $userItems = $user->items()->where('itemId', $item->id)->get();
            if ($userItems) {
                $item = $userItems->first();

                $item->pivot->count = $userItems->pluck('pivot')->sum('count');
            }

            $characters = $user->characters()
                ->with('itemStyles')
                ->get();

            $items = $user->items;
        }

        $sales = ItemSale::where('item_id', $item->id)
            ->where('sold_at', '>=', Carbon::now()->subMonth())
            ->select(DB::raw('avg(price_ea) as price_avg, max(price_ea) as price_max, min(price_ea) as price_min, count(*) as hits'))
            ->get(['price_avg', 'price_max', 'price_min', 'hits'])
            ->first()
            ->getAttributes();

        return view('item.itembox', compact('item', 'set', 'items', 'characters', 'itemStyleChapter', 'sales'));
    }

}
