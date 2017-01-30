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

    public function show(Zones $zones, $slug) {
        $zone = $zones->getZoneBySlug($slug);
        if(is_null($zone)) {
            abort(404);
        }

        $user = Auth::user();
        $items = null;
        $favourites = null;
        if($user) {
            $items = $user->items->load('character')->groupBy('setId');
            $favourites = $user->favouriteSets->pluck('setId')->toArray();
        }

        $zoneSets = ZoneSet::where('zoneId', $zone['id'])->get();
        $dungeons = Dungeon::where('zone', $zone['id'])->orderBy('dungeonTypeEnum')->get();
        $sets = Set::whereIn('id', $zoneSets->pluck('setId'))->get();

        return view('zones.show', compact('zone', 'items', 'favourites', 'sets', 'all_sets', 'user', 'dungeons'));
    }

}