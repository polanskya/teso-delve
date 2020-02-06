<?php

namespace App\Http\Controllers;

use App\Enum\ItemType;
use App\Model\Guild;
use App\Model\GuildMember;
use App\Model\Item;
use App\Model\ItemSale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuildController extends Controller
{
    public function show(Guild $guild)
    {
        $guild->load('members.user.characters');
        $now = Carbon::now();

        $start = Carbon::now()->firstOfMonth();
        $dates = [
            'start' => $start->copy()->firstOfMonth(),
            'end' => $now,
            'startCompare' => $start->copy()->subMonth()->firstOfMonth(),
            'endCompare' => $now->copy()->subMonth(),
        ];

        $startDate = $dates['start'];
        $endDate = $dates['end'];
        $startCompare = $dates['startCompare'];
        $endCompare = $dates['endCompare'];

        $user = Auth::user();

        $salesSum = ItemSale::where('guild_id', $guild->id)
            ->where('sold_at', '>=', $startDate)
            ->where('sold_at', '<=', $endDate)
            ->sum('price');

        $salesSumMonth = ItemSale::where('guild_id', $guild->id)
            ->where('sold_at', '>=', $startCompare)
            ->where('sold_at', '<=', $endCompare)
            ->sum('price');

        $salesCountActive = ItemSale::where('guild_id', $guild->id)
            ->between($startDate, $endDate)
            ->count();

        $salesCountCompare = ItemSale::where('guild_id', $guild->id)
            ->between($startCompare, $endCompare)
            ->count();

        $salesCount = [
            'active' => $salesCountActive,
            'compare' => $salesCountCompare,
        ];

        $traderSalesNow = ItemSale::where('guild_id', $guild->id)
            ->between($startDate, $endDate)
            ->where('isKiosk', 1)
            ->sum('price');

        $traderSalesCompare = ItemSale::where('guild_id', $guild->id)
            ->between($startCompare, $endCompare)
            ->where('isKiosk', 1)
            ->sum('price');

        $traderSales = [
            'active' => $traderSalesNow,
            'compare' => $traderSalesCompare,
        ];

        $biggestSales = ItemSale::where('guild_id', $guild->id)
            ->between($startDate, $endDate)
            ->orderBy('price', 'desc')
            ->with('item')
            ->take(10)
            ->get();

        $accountSales = ItemSale::where('guild_id', $guild->id)
            ->between($startDate, $endDate)
            ->select('seller', DB::raw('sum(price) as price'), DB::raw('count(price) as sales'))
            ->orderBy('price', 'desc')
            ->groupBy('seller')
            ->get()
            ->keyBy('seller');

        $accountSalesCompare = ItemSale::where('guild_id', $guild->id)
            ->between($startCompare, $endCompare)
            ->select('seller', DB::raw('sum(price) as price'), DB::raw('count(price) as sales'))
            ->orderBy('price', 'desc')
            ->groupBy('seller')
            ->get()
            ->keyBy('seller');

        $myAccountSales = collect();
        $myAccountSalesCompare = collect();
        foreach ($user->accounts() as $account) {
            $myAccountSales->push($accountSales->get($account));
            $myAccountSalesCompare->push($accountSalesCompare->get($account));
        }

        $mySales = [
            'price' => $myAccountSales->sum('price'),
            'sales' => $myAccountSales->sum('sales'),
            'priceCompare' => $myAccountSalesCompare->sum('price'),
            'salesCompare' => $myAccountSalesCompare->sum('sales'),
        ];

        $members24 = GuildMember::where('guild_id', $guild->id)
            ->where('lastSeen_at', '>=', $now->copy()->subDay())
            ->count();

        $members7days = GuildMember::where('guild_id', $guild->id)
            ->where('lastSeen_at', '>=', $now->copy()->subDays(7))
            ->count();

        $membersInfo = [
            '24hrs' => $members24,
            '7days' => $members7days,
        ];

        $data = compact(
            'guild',
            'salesSum',
            'now',
            'accountSales',
            'membersInfo',
            'salesSumMonth',
            'salesComparison',
            'traderSales',
            'salesCount',
            'biggestSales',
            'user',
            'mySales',
            'dates'
        );

        return view('guild.show', $data);
    }

    public function members(Guild $guild)
    {
        $user = Auth::user();

        $start = Carbon::now()->firstOfMonth();
        $dates = [
            'start' => $start->copy()->firstOfMonth(),
            'end' => $start->copy()->lastOfMonth(),
            'startCompare' => $start->copy()->subMonth()->firstOfMonth(),
            'endCompare' => $start->copy()->subMonth()->lastOfMonth(),
        ];

        $accountSales = ItemSale::where('guild_id', $guild->id)
            ->between($dates['start'], $dates['end'])
            ->select('seller', DB::raw('sum(price) as price'), DB::raw('count(price) as sales'))
            ->orderBy('price', 'desc')
            ->groupBy('seller')
            ->get()
            ->keyBy('seller');

        $guild->load('members.user.characters');

        $ranks = $guild->ranks
            ->keyBy('rank_index');

        return view('guild.members', compact('guild', 'user', 'accountSales', 'members', 'ranks'));
    }

    public function bank(Guild $guild)
    {
        return view('guild.coming-soon', compact('guild'));
    }

    public function sales(Request $request, Guild $guild)
    {
        $start = Carbon::now()->firstOfMonth();
        $dates = [
            'start' => $start->copy()->firstOfMonth(),
            'end' => $start->copy()->lastOfMonth(),
            'startCompare' => $start->copy()->subMonth()->firstOfMonth(),
            'endCompare' => $start->copy()->subMonth()->lastOfMonth(),
        ];

        $members = $guild->members()
            ->orderBy('accountName')
            ->get();

        $filter = $request->get('filter');

        $sales = ItemSale::where('guild_id', $guild->id)
            ->orderBy('sold_at', 'desc')
            ->select(
                ItemSale::getColumnName('*'),
                Item::getColumnName('name').' as itemName',
                Item::getColumnName('type').' as itemType'
            )
            ->leftJoin(Item::getTableName(), ItemSale::getColumnName('item_id'), '=', Item::getColumnName('id'))
            ->when($request->get('seller'), function ($query) use ($request) {
                return $query->where('seller', $request->get('seller'));
            })
            ->when($request->get('buyer'), function ($query) use ($request) {
                return $query->where('buyer', $request->get('seller'));
            })
            ->when($filter == 'weapon', function ($query) {
                return $query->where(Item::getColumnName('type'), ItemType::WEAPON);
            })
            ->when($filter == 'armor', function ($query) {
                return $query->where(Item::getColumnName('type'), ItemType::ARMOR);
            })
            ->when($filter == 'consumable', function ($query) {
                return $query->whereIn(Item::getColumnName('type'), ItemType::consumables());
            })
            ->when($filter == 'material', function ($query) {
                return $query->whereIn(Item::getColumnName('type'), ItemType::materials());
            })
            ->when($filter == 'misc', function ($query) {
                return $query->whereIn(Item::getColumnName('type'), ItemType::misc());
            })
            ->when(! empty($request->get('name')), function ($query) use ($request) {
                return $query->where(Item::getColumnName('name'), 'LIKE', '%'.$request->get('name').'%');
            })
            ->paginate(200);

        $sales->appends($request->all());

        return view('guild.sales', compact('guild', 'dates', 'sales', 'members'));
    }

    public function ranks(Guild $guild)
    {
        return view('guild.coming-soon', compact('guild'));
    }
}
