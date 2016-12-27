<?php namespace App\Http\Controllers;


use App\Enum\BagType;
use App\Enum\EquipType;
use App\Model\Character;
use App\Model\UserItem;
use Illuminate\Support\Facades\Auth;

class CharacterController
{

    public function show(Character $character) {
        $user = Auth::user();

        $equippedItems = UserItem::where('characterId', $character->id)
            ->where('bagEnum', BagType::WORN)
            ->with('item.set.bonuses')
            ->get();

        //$head = $equippedItems->where('equipTypeEnum', EquipType::HEAD)->first();

        return view('character.show', compact('character', 'equippedItems'));
    }


}
