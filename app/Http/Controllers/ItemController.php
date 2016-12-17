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
        $item->load('set.bonuses');

        $set = $item->set;
        $user = Auth::user();

        $favourites = $user->favouriteSets
            ->pluck('setId')
            ->toArray();

        $items = $user->items
            ->where('setId', $set->id)
            ->load('character');

        return view('item.show', compact('item', 'favourites', 'items', 'set'));
    }

}