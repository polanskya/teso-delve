<?php

namespace App\Http\Controllers;

use App\Enum\CraftingType;
use App\Enum\ItemType;
use App\Enum\ResearchLine;
use App\Model\CraftingItem;
use App\Model\Item;
use App\Model\ItemStyle;
use Illuminate\Support\Facades\App;

class CraftingController
{
    public function calculator()
    {
        $craftingType = CraftingType::BLACKSMITHING;
        $researchLines = ResearchLine::blacksmithing();
        $researchLinesGrouped = ResearchLine::blacksmithingGrouped();

        $craftingItems = CraftingItem::where('smithingTypeEnum', $craftingType)
            ->get();

        $materials = Item::whereIn('id', $craftingItems->pluck('material_id')
            ->unique())
            ->get()
            ->keyBy('id');

        $craftingItemsGrouped = $craftingItems->sortBy('sort')
            ->groupBy('material_id');

        $tempers = Item::where('type', ItemType::BLACKSMITHING_BOOSTER)
            ->orderBy('quality')
            ->where('lang', App::getLocale())
            ->get();

        $itemStyles = ItemStyle::with('materialItem')
            ->orderBy('name')
            ->where('craftable', 1)
            ->whereNotNull('material')
            ->get();

        $traits = [
            'weapons' => Item::where('type', ItemType::WEAPON_TRAIT)->where('lang', App::getLocale())->get(),
            'armors' => Item::where('type', ItemType::ARMOR_TRAIT)->where('lang', App::getLocale())->get(),
        ];

        return view('crafting.calculator', compact('researchLines', 'craftingItemsGrouped', 'materials', 'researchLinesGrouped', 'tempers', 'itemStyles', 'craftingType', 'traits'));
    }
}
