<?php namespace App\Http\Controllers;


use App\Enum\DungeonType;
use App\Model\DailyPledges;
use App\Model\Dungeon;
use App\Model\Set;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DungeonController
{

    public function index() {
        $routeName = Route::getCurrentRoute()->getName();

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

        $dungeons = Dungeon::with('sets', 'bosses')
            ->where('dungeonTypeEnum', $dungeonType)
            ->get()
            ->groupBy('alliance');

        $pledges = DailyPledges::where('date', Carbon::now()->toDateString())->first();
        $pledges = [$pledges->pledge1, $pledges->pledge2, $pledges->pledge3];

        return view('dungeon.index', compact('dungeons', 'items', 'dungeonType', 'pledges'));
    }

    public function show(Request $request, Dungeon $dungeon)
    {
        $sets = $dungeon->sets;
        $bosses = $dungeon->bosses->sortBy('order');

        $all_sets = Set::whereNotIn('id', $sets->pluck('id'))
            ->orderBy('name')
            ->get();

        $items = null;
        $favourites = null;
        $user = null;
        if (Auth::check()) {
            $items = Auth::user()->items->load('character')->groupBy('setId');
            $favourites = Auth::user()->favouriteSets->pluck('setId')->toArray();
            $user = Auth::user();
        }

        return view('dungeon.show', compact('dungeon', 'items', 'favourites', 'sets', 'all_sets', 'user', 'bosses'));
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

        $all_sets = Set::whereNotIn('id', $sets->pluck('id'))
            ->orderBy('name')
            ->get();

        return view('dungeon.edit', compact('dungeon', 'sets', 'all_sets'));
    }

    public function addSet(Request $request, Dungeon $dungeon) {
        $setId = $request->get('setId');
        $dungeon->sets()->attach($setId);
        return redirect()->route('dungeon.show', [$dungeon]);
    }

}