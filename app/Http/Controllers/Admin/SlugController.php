<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Dungeon;
use App\Model\Item;
use App\Model\ItemStyle;
use App\Model\Set;
use Carbon\Carbon;

class SlugController extends Controller
{
    public function generateSlugs()
    {
        set_time_limit(120);

        foreach (Set::all() as $set) {
            $set->updated_at = Carbon::now();
            $set->save();
        }

        foreach (ItemStyle::all() as $itemStyle) {
            $itemStyle->updated_at = Carbon::now();
            $itemStyle->save();
        }

        foreach (Dungeon::all() as $dungeon) {
            $dungeon->updated_at = Carbon::now();
            $dungeon->save();
        }
    }
}
