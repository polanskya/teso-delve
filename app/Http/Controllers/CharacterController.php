<?php namespace App\Http\Controllers;


use App\Enum\BagType;
use App\Enum\CraftingType;
use App\Enum\EquipType;
use App\Enum\SetType;
use App\Model\Character;
use App\Model\ItemStyle;
use App\Model\Set;
use App\Model\UserItem;
use HeppyKarlsson\Meta\Model\Meta;
use Illuminate\Support\Facades\Auth;

class CharacterController
{

    public function show(Character $character) {
        $user = Auth::user();

        $equippedItems = $character->items()
            ->where('user_items.bagEnum', BagType::WORN)
            ->with('set.bonuses')
            ->get();

        return view('character.show', compact('character', 'equippedItems', 'user'));
    }

    public function index() {
        $user = Auth::user();
        $characters = $user->characters()
            ->with('craftingTraits')
            ->orderByRaw('level DESC, name')
            ->get();

        return view('character.index', compact('characters'));
    }

    public function itemStyles(Character $character) {
        $knownItemStyles = $character->itemStyles;
        $itemStyles = ItemStyle::where('craftable', 1)->get();

        return view('character.itemStyles', compact('character', 'knownItemStyles', 'itemStyles'));
    }

    public function craftingResearch(Character $character, $caftingTypeEnum) {
        $user = Auth::user();

        $equippedItems = $character->items()
            ->where('user_items.bagEnum', BagType::WORN)
            ->with('set.bonuses')
            ->get();

        $craftingTraits = $character->craftingTraits()
            ->where('craftingTypeEnum', $caftingTypeEnum)
            ->get();

        $researchLineIndex = $craftingTraits->groupBy('researchLineIndex');

        $craftableSets = Set::where('setTypeEnum', SetType::CRAFTED)
            ->with('meta')
            ->get();

        return view('character.crafting', compact('character', 'equippedItems', 'user', 'craftingTraits', 'researchLineIndex', 'craftableSets', 'caftingTypeEnum'));
    }

    public function inventory(Character $character, $bagEnum = null) {
        $items = $character->items->where('pivot.bagEnum', is_null($bagEnum) ? BagType::BACKPACK : $bagEnum);
        $gold = $character->currency;

        return view('inventory.index', compact('character', 'bagEnum', 'items', 'gold'));
    }

}
