<?php namespace App\Http\Controllers;


use App\Model\Dungeon;
use App\Model\Item;
use App\Model\Set;
use App\Model\ZoneSet;
use App\Objects\Zones;
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
            $userItem = $user->items->where('id', $item->id)->first();
            if ($userItem) {
                $item = $userItem;
            }

            $favourites = $user->favouriteSets
                ->pluck('setId')
                ->toArray();

            $items = $user->items
                ->where('setId', $item->setId);
        }

        $item->load('set.bonuses');
        $set = $item->set;

        return view('item.show', compact('item', 'favourites', 'items', 'set'));
    }

    public function ajaxShow(Item $item) {
        $set = $item->set;
        $items = Auth::user()->items;
        return view('item.itembox', compact('item', 'set', 'items'));
    }

}
