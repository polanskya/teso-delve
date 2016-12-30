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

        $equippedItems = $character->items()
            ->where('user_items.bagEnum', BagType::WORN)
            ->with('set.bonuses')
            ->get();

        //$head = $equippedItems->where('equipTypeEnum', EquipType::HEAD)->first();

        return view('character.show', compact('character', 'equippedItems', 'user'));
    }


}
