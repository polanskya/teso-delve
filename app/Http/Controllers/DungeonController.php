<?php namespace App\Http\Controllers;


use App\Model\Dungeon;
use App\Model\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DungeonController
{

    public function index() {
        $dungeons = Dungeon::with('sets')->get()->groupBy('alliance');
        return view('dungeon.index', compact('dungeons', 'items'));
    }

    public function show(Dungeon $dungeon)
    {
        $sets = $dungeon->sets;

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

        return view('dungeon.show', compact('dungeon', 'items', 'favourites', 'sets', 'all_sets', 'user'));
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