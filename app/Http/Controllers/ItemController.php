<?php namespace App\Http\Controllers;


use App\Model\Dungeon;
use App\Model\Item;
use App\Model\Set;
use App\Model\ZoneSet;
use App\Objects\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController
{

    public function index() {

    }

    public function show(Item $item) {
        $user = Auth::user();
        $userItem = $user->items->where('id', $item->id)->first();
        if($userItem) {
            $item = $userItem;
        }

        $item->load('set.bonuses');

        $set = $item->set;

        $favourites = $user->favouriteSets
            ->pluck('setId')
            ->toArray();

        $items = $user->items
            ->where('setId', $set->id);

        return view('item.show', compact('item', 'favourites', 'items', 'set'));
    }

}