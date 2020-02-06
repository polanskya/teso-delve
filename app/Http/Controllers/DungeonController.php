<?php namespace App\Http\Controllers;


use App\Enum\DungeonType;
use App\Enum\SetType;
use App\Model\DailyPledges;
use App\Model\Dungeon;
use App\Model\Set;
use App\Model\ZoneSet;
use App\Objects\Zones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DungeonController
{

    public function index() {
        $routeName = Route::getCurrentRoute()->getName();
        $items = Dungeon::all();

        $dungeonType = DungeonType::GROUP_DUNGEON;
        if($routeName == 'dungeons.public.index') {
            $dungeonType = DungeonType::PUBLIC_DUNGEON;
        }
        elseif($routeName == 'dungeons.trials.index') {
            $dungeonType = DungeonType::TRIAL;
        }
        elseif($routeName == 'dungeons.delves.index') {
            $dungeonType = DungeonType::DELVE;
        }
        elseif($routeName == 'dungeons.arenas.index') {
            $dungeonType = DungeonType::ARENA;
        }

        $dungeons = Dungeon::with('sets', 'bosses')
            ->where('dungeonTypeEnum', $dungeonType)
            ->get()
            ->groupBy('alliance');

        $pledges = DailyPledges::where('date', Carbon::now()->toDateString())->first();
        $pledges = [$pledges->pledge1, $pledges->pledge2, $pledges->pledge3];

        return view('dungeon.index', compact('dungeons', 'items', 'dungeonType', 'pledges'));
    }

    public function store(Request $request) {
        $data = $request->get('dungeon');

        $dungeon = new Dungeon();
        $dungeon->name = $data['name'];
        $dungeon->dungeonTypeEnum = empty($data['dungeonTypeEnum']) ? null : $data['dungeonTypeEnum'];
        $dungeon->zone = empty($data['zone']) ? null : $data['zone'];
        $zoneObject = new Zones();

        if(!is_null($dungeon->zone)) {
            $zone = $zoneObject->getZone($dungeon->zone);
        }

        $dungeon->alliance = isset($zone) ? $zone['Alliance'] : null;
        $dungeon->image = $data['image'];
        $dungeon->description = $data['description'];
        $dungeon->groupSize = empty($data['groupSize']) ? null : $data['groupSize'];
        $dungeon->save();

        return redirect()->route('dungeon.show', [$dungeon]);
    }

    public function create(Request $request) {
        $dungeon = new Dungeon();

        $dungeon->dungeonTypeEnum = $request->has('dungeonType') ? $request->get('dungeonType') : null;
        $zones = new Zones();
        $zones = $zones->getZones();

        return view('dungeon.edit', compact('dungeon', 'zones'));
    }

    public function show(Request $request, Dungeon $dungeon)
    {
        $sets = $dungeon->sets;

        if(in_array($dungeon->dungeonTypeEnum, [DungeonType::DELVE, DungeonType::PUBLIC_DUNGEON])) {

            $sets = ZoneSet::where('zoneId', $dungeon->zone)
                ->with('sets')
                ->get()
                ->pluck('sets');
        }

        $bosses = $dungeon->bosses->sortBy('order');
        $user = Auth::user();

        $all_sets = Set::whereNotIn('id', $sets->pluck('id'))
            ->orderBy('name')
            ->where('lang', $user ? $user->lang : config('constants.default-language'))
            ->get();

        $pledge = DailyPledges::where('date', '>', Carbon::now())
            ->where(function($query) use ($dungeon) {
                return $query->orWhere('pledge1', $dungeon->id)
                    ->orWhere('pledge2', $dungeon->id)
                    ->orWhere('pledge3', $dungeon->id);
            })
            ->orderBy('date')
            ->first();

        $items = null;
        $favourites = null;
        if ($user) {
            $items = $user->items->load('character')->groupBy('setId');
            $favourites = $user->favouriteSets->pluck('setId')->toArray();
        }

        return view('dungeon.show', compact('dungeon', 'items', 'favourites', 'sets', 'all_sets', 'user', 'bosses', 'pledge'));
    }

    public function update(Dungeon $dungeon, Request $request) {
        $data = $request->get('dungeon');
        $dungeon->description = $data['description'];
        $dungeon->name = $data['name'];
        $dungeon->image = $data['image'];
        $dungeon->save();

        return redirect()->route('dungeon.show', $dungeon);
    }

    public function edit(Dungeon $dungeon) {
        $sets = $dungeon->sets;

        $zones = new Zones();
        $zones = $zones->getZones();

        $all_sets = Set::whereNotIn('id', $sets->pluck('id'))
            ->orderBy('name')
            ->get();

        return view('dungeon.edit', compact('dungeon', 'sets', 'all_sets', 'zones'));
    }

    public function addSet(Request $request, Dungeon $dungeon) {
        $setId = $request->get('setId');
        $dungeon->sets()->attach($setId);
        return redirect()->route('dungeon.show', [$dungeon]);
    }

}