<?php namespace App\Http\Controllers;


use App\Model\Dungeon;
use App\Model\Set;
use App\Model\ZoneSet;
use App\Objects\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ZoneController
{

    public function index() {
        $z = new Zones();
        $zones = $z->getZonesByAlliance();
        return view('zones.index', compact('zones', 'zones'));
    }

    public function show($zoneId) {
        $zoneSets = ZoneSet::where('zoneId', $zoneId)->get();
        $items = Auth::user()->items->load('character');
        $favourites = Auth::user()->favouriteSets->pluck('setId')->toArray();
        $z = new Zones();

        $sets = Set::whereIn('id', $zoneSets->pluck('setId'))->get();


        $zone = $z->getZone($zoneId);

        return view('zones.show', compact('zone', 'items', 'favourites', 'sets', 'all_sets'));
    }

}