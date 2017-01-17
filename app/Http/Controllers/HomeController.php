<?php

namespace App\Http\Controllers;

use App\Model\Character;
use App\Model\CharacterItemStyle;
use App\Model\DailyPledges;
use App\Model\Item;
use App\Model\ItemStyleChapter;
use App\Model\Set;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailyPledges = DailyPledges::where('date', '>=', Carbon::now()->subDay())
            ->with('firstPledge.sets', 'secondPledge.sets', 'thirdPledge.sets')
            ->take(2)
            ->orderBy('date')
            ->get();

        $itemCount = Cache::remember('total-item-count', 60*2, function() {
            return Item::count();
        });

        $characterCount = Cache::remember('total-character-count', 60*2, function() {
            return Character::count();
        });

        $motifCount = Cache::remember('total-motif-count', 60*2, function() {
            return CharacterItemStyle::count();
        });

        $setsCount = Cache::remember('total-sets-count', 60*2, function() {
            return Set::count();
        });

        return view('home.index', compact('dailyPledges', 'itemCount', 'characterCount', 'motifCount', 'setsCount'));
    }
}
