<?php namespace App\Http\Controllers;


use App\Model\Set;
use App\Model\SetBonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetController
{

    public function mySets() {
        $favourites = Auth::user()->favouriteSets->pluck('setId')->toArray();
        $sets = Set::with('bonuses')->orderBy('name')->get();
        $items = Auth::user()->items;

        return view('sets.my_sets', compact('sets', 'items', 'favourites'));
    }

    public function edit(Set $set) {
        return view('sets.edit', compact('set'));
    }

    public function update(Set $set, Request $request) {
        $data = $request->get('set');
        $set->name = $data['name'];
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

        return redirect()->back()->with('updated', true);
    }
}