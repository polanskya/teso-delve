<?php namespace App\Http\Controllers;


use App\Enum\DungeonType;
use App\Enum\PledgeChest;
use App\Enum\SetType;
use App\Model\Dungeon;
use App\Model\DungeonSet;
use App\Model\Set;
use App\Model\SetBonus;
use App\Model\UserSetFavourite;
use App\Model\ZoneSet;
use App\Objects\Zones;
use Carbon\Carbon;
use HeppyKarlsson\Meta\Service\MetaService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SetController
{

    public function index() {
        $data = Cache::remember('sets-list-data', 0, function() {
            $sets = Set::where('lang', config('constants.default-language'))
                ->with(['meta', 'zones', 'bonuses', 'dungeons'])
                ->orderBy('name')
                ->get();

            $monsterSets = $sets->where('setTypeEnum', SetType::MONSTER)->values();
            $craftedSets = $sets->where('setTypeEnum', SetType::CRAFTED)->values();
            $dungeonSets = $sets->where('setTypeEnum', SetType::DUNGEON)->values();
            $zoneSets = $sets->where('setTypeEnum', SetType::ZONE)->values();
            $sets = $sets->whereIn('setTypeEnum', [null])->values();

            return compact('monsterSets', 'craftedSets', 'dungeonSets', 'zoneSets', 'sets');
        });

        return view('sets.index', $data);
    }

    public function mySets(Request $request) {
        $user = Auth::user();
        $user->load('favouriteSets', 'items.set');

        $favourites = $user->favouriteSets
            ->pluck('setId')
            ->toArray();

        $sets = Set::with('bonuses')
            ->where('lang', $user->lang)
            ->orderBy('name');

        if($request->has('search')) {
            $sets->where('name', 'like', '%'.$request->get('search').'%');
        }

        $sets = $sets->get();

        $characterId = $request->get('characterId');
        $items = $user->items()
            ->orderBy($request->has('sortBy') ? $request->get('sortBy') : 'equipType', $request->has('sort') ? $request->get('sort') : 'asc')
            ->when($characterId, function($query) use ($characterId) {
                return $query->where('user_items.characterId', $characterId);
            })
            ->get()
            ->groupBy('setId');




        return view('sets.my_sets', compact('sets', 'items', 'favourites', 'user'));
    }

    public function edit(Set $set) {
        $zonesService = new Zones();
        $dungeonsByAlliance = Dungeon::whereIn('dungeonTypeEnum', [DungeonType::TRIAL, DungeonType::GROUP_DUNGEON, DungeonType::ARENA])
            ->get()
            ->groupBy('alliance');

        $set->load('bonuses', 'dungeons', 'zones');

        return view('sets.edit', compact('set', 'dungeonsByAlliance', 'zonesService'));
    }

    public function show($set_slug) {

        $user = Auth::user();

        $set = Set::where('slug', $set_slug)->first();

        if(!$set) {
            abort(404);
        }

        $items = null;
        $favourites = null;
        $isFavourite = null;

        if($user) {
            $user->load('favouriteSets');

            $favourites = $user->favouriteSets
                ->pluck('setId')
                ->toArray();

            $items = $user->items()
                ->where('setId', $set->id)
                ->with('character')
                ->get();

            $isFavourite = in_array($set->id, $favourites);
        }

        return view('sets.show', compact('set', 'items', 'favourites', 'isFavourite', 'user'));
    }

    public function monster() {
        $user = Auth::user();
        $favourites = null;
        $items = null;

        if($user) {
            $favourites = $user->favouriteSets->pluck('setId')->toArray();
            $items = $user->items()->with('character')->orderBy('equipType')->get();
        }

        $sets = Set::with('bonuses')
            ->where('setTypeEnum', SetType::MONSTER)
            ->orderBy('name')
            ->get();

        return view('sets.monster_sets', compact('sets', 'items', 'favourites', 'user'));
    }

    public function monsterChest($chest) {
        $quest_givers = PledgeChest::constants();
        $giverKey = null;
        foreach($quest_givers as $giverName => $value) {
            $giverKey = ($chest == str_slug(trans('eso.pledgeChest.'.$value)))  ? $value : $giverKey;
        }

        if(is_null($giverKey)) {
            abort(404);
        }

        $user = Auth::user();
        $favourites = null;
        $items = null;

        if($user) {
            $favourites = $user->favouriteSets->pluck('setId')->toArray();
            $items = $user->items()->with('character')->orderBy('equipType')->get();
        }

        $sets = Cache::remember('pledge_chest_sets_'.$giverKey, config('cacheTimers.pledge_chest_sets_*'), function() use ($giverKey) {
            $all_sets = Set::with('bonuses')
                ->where('setTypeEnum', SetType::MONSTER)
                ->orderBy('name')
                ->get();

            $sets = new Collection();

            /** @var Set $set */
            foreach($all_sets as $set) {
                if($set->getMeta('monster_chest') == $giverKey) {
                    $sets->add($set);
                }
            }

            return $sets;
        });

        return view('sets.monster_sets', compact('sets', 'items', 'favourites', 'user', 'giverKey'));

    }

    public function craftable() {
        $user = Auth::user();
        $favourites = null;
        $items = null;

        if($user) {
            $favourites = $user->favouriteSets
                ->pluck('setId')
                ->toArray();

            $items = $user->items()
                ->with('character')
                ->orderBy('equipType')
                ->get();
        }

        $sets = Set::with('bonuses')
            ->where('setTypeEnum', SetType::CRAFTED)
            ->orderBy('name')
            ->get();

        return view('sets.craftable', compact('sets', 'items', 'favourites', 'user'));
    }

    public function toggleFavourite($set) {
        $set = Set::find($set);
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

    public function ajaxShow($setId) {
        $set = Set::find($setId);
        $user = null;
        $favourites = null;
        $items = null;
        $isFavourite = null;

        if(Auth::check()) {
            $user = Auth::user();
            $user->load('items', 'favouriteSets');

            $favourites = $user->favouriteSets
                ->pluck('setId')
                ->toArray();

            $items = $user->items
                ->where('setId', $set->id)
                ->load('character');

            $isFavourite = in_array($set->id, $favourites);
        }

        return view('sets.setbox', compact('set', 'items', 'favourites', 'isFavourite', 'user'));
    }

    public function update(Set $set, Request $request) {
        $data = $request->get('set');
        $set->craftable = isset($data['craftable']);
        $set->description = $data['description'];
        $set->setTypeEnum = $data['setTypeEnum'] != 0 ? intval($data['setTypeEnum']) : null;

        $set->save();
        $set->bonuses()->delete();

        foreach($request->get('set_bonus') as $setBonus) {
            if(empty($setBonus['description'])) {
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

        $set_meta = $request->get('set_meta');
        if($set->setTypeEnum == SetType::MONSTER and isset($set_meta['monster'])) {
            $set->setMeta('monster_chest', $set_meta['monster']);
        }


        if($set->setTypeEnum == SetType::CRAFTED) {

            if($request->has('crafted_traitNeeded')) {
                $set->setMeta('crafting_traits_needed', $request->get('crafted_traitNeeded'));
            }

            if($request->has('craftingBench')) {
                foreach ($request->get('craftingBench') as $key => $craftingBench) {
                    $set->setMeta('crafting_bench_' . $key, $craftingBench);
                }
            }
        }

        return redirect()->back()->with('updated', true);
    }
}
