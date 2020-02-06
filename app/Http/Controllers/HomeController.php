<?php

namespace App\Http\Controllers;

use App\Model\Character;
use App\Model\CharacterItemStyle;
use App\Model\DailyPledges;
use App\Model\Dungeon;
use App\Model\Item;
use App\Model\ItemStyle;
use App\Model\ItemStyleChapter;
use App\Model\Set;
use App\Services\ServerService;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(ServerService $serverService)
    {
        $dailyPledges = DailyPledges::where('date', '>=', Carbon::now()->subDay())
            ->with('firstPledge.sets', 'secondPledge.sets', 'thirdPledge.sets')
            ->take(2)
            ->orderBy('date')
            ->get();

        $lang = App::getLocale();

        $statuses = $serverService->serverStatus();

        $information = Cache::remember('startpage-info-'.$lang, 60 * 2, function () use ($lang) {
            return [
                'items' => Item::where('lang', App::getLocale())->count(),
                'characters' => Character::count(),
                'sets' => Set::where('lang', $lang)->count(),
                'motifs' => CharacterItemStyle::where('isKnown', 1)->count(),
                'users' => User::count(),
                'styles' => ItemStyle::count(),
                'dungeons' => Dungeon::count(),
            ];
        });

        return view('home.index', compact('dailyPledges', 'information', 'statuses'));
    }
}
