<?php

namespace App\Http\Controllers;

use App\Model\Character;
use App\Model\DailyPledges;
use App\Model\Item;
use Carbon\Carbon;

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

        $itemCount = Item::count();

        $characterCount = Character::count();

        return view('home.index', compact('dailyPledges', 'itemCount', 'characterCount'));
    }
}
