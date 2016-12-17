<?php namespace App\Http\Controllers;


use App\Model\Dungeon;
use App\Model\DungeonSet;
use App\Model\Set;
use App\Model\SetBonus;
use App\Model\UserSetFavourite;
use App\Model\ZoneSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetController
{

    public function mySets() {
        $favourites = Auth::user()->favouriteSets
            ->pluck('setId')
            ->toArray();

        $sets = Set::with('bonuses')
            ->orderBy('name')
            ->get();

        $items = Auth::user()->items()
            ->with('character')
            ->orderBy('equipType')
            ->get();

        return view('sets.my_sets', compact('sets', 'items', 'favourites'));
    }

    public function edit(Set $set) {
        $dungeonsByAlliance = Dungeon::all()->groupBy('alliance');
        $set->load('bonuses', 'dungeons', 'zones');
        return view('sets.edit', compact('set', 'dungeonsByAlliance'));
    }

    public function show(Set $set) {
        $user = Auth::user();
        $user->load('items', 'favouriteSets');

        $favourites = $user->favouriteSets
            ->pluck('setId')
            ->toArray();

        $items = $user->items
            ->where('setId', $set->id)
            ->load('character');

        $isFavourite = in_array($set->id, $favourites);

        return view('sets.show', compact('set', 'items', 'favourites', 'isFavourite', 'user'));
    }

    public function craftable() {
        $favourites = Auth::user()->favouriteSets->pluck('setId')->toArray();
        $sets = Set::with('bonuses')->where('craftable', 1)->orderBy('name')->get();
        $items = Auth::user()->items()->with('character')->orderBy('equipType')->get();

        return view('sets.my_sets', compact('sets', 'items', 'favourites'));
    }

    public function toggleFavourite(Set $set) {
        $user = Auth::user();
        if($user->favouriteSets->contains('setId', $set->id)) {
            $user->favouriteSets()->where('setId', $set->id)->delete();
        }
        else {
            $favourite = new UserSetFavourite();
            $favourite->setId = $set->id;
            $favourite->userId = $user->id;
            $favourite->save();
        }
    }

    public function update(Set $set, Request $request) {
        $data = $request->get('set');
        $set->craftable = isset($data['craftable']);
        $set->traitNeeded = null;
        if($set->craftable) {
            $set->traitNeeded = intval($data['traitNeeded']);
        }
        $set->description = $data['description'];
        $set->save();

        $set->bonuses()->delete();

        foreach($request->get('set_bonus') as $setBonus) {
            if(intval($setBonus['bonusNumber']) == 0) {
                continue;
            }

            $bonus = new SetBonus();
            $bonus->bonusNumber = $setBonus['bonusNumber'];
            $bonus->description = $setBonus['description'];

            $set->bonuses()->save($bonus);
        }

        ZoneSet::where('setId', $set->id)->delete();

        if($request->has('zones')) {
            foreach ($request->get('zones') as $zone) {
                if (empty($zone)) {
                    continue;
                }

                $zoneSet = new ZoneSet();
                $zoneSet->setId = $set->id;
                $zoneSet->zoneId = $zone;
                $zoneSet->save();
            }
        }

        DungeonSet::where('setId', $set->id)->delete();

        if($request->has('dungeons')) {
            foreach($request->get('dungeons') as $dungeonId) {
                if(empty($dungeonId)) {
                    continue;
                }

                $dungeonSet = new DungeonSet();
                $dungeonSet->setId = $set->id;
                $dungeonSet->dungeonId = $dungeonId;
                $dungeonSet->save();
            }
        }


        return redirect()->back()->with('updated', true);
    }
}