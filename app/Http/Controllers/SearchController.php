<?php namespace App\Http\Controllers;

use App\Model\Dungeon;
use App\Model\Item;
use App\Model\ItemStyle;
use App\Model\Set;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;

class SearchController extends Controller
{

    public function search(Request $request) {
        $search = $request->get('s');

        $merged_results = collect();

        $counts = [
            'sets' => 0,
            'items' => 0,
            'styles' => 0,
            'dungeons' => 0,
            'total' => 0,
        ];

        if(!empty($search)) {

            $sets = Set::where('name', 'like', "%{$search}%")
                ->select('id', 'name')
                ->where('lang', App::getLocale())
                ->orderBy('id')
                ->get();

            $items = Item::where('name', 'like', "%{$search}%")
                ->select('id', 'name')
                ->where('lang', App::getLocale())
                ->orderBy('championLevel', 'desc')
                ->orderBy('level', 'desc')
                ->get();

            $styles = ItemStyle::where('name', 'like', "%{$search}%")
                ->where('isHidden', 0)
                ->select('id', 'name')
                ->orderBy('id')
                ->get();

            $dungeons = Dungeon::where('name', 'like', "%{$search}%")
                ->select('id', 'name')
                ->orderBy('id')
                ->get();

            $counts = [
                'sets' => $sets->count(),
                'items' => $items->count(),
                'styles' => $styles->count(),
                'dungeons' => $dungeons->count(),
            ];

            $counts['total'] = $counts['sets'] + $counts['items'] + $counts['styles'] + $counts['dungeons'];

            $merged_results = $merged_results->merge($sets);
            $merged_results = $merged_results->merge($items);
            $merged_results = $merged_results->merge($styles);
            $merged_results = $merged_results->merge($dungeons);
        }

        $merged_results = $merged_results->take(75);
        $results = collect();

        foreach($merged_results as $result) {
            $result = $result->fresh();
            $results->push($result);
        }

        return view('search.results', compact('search', 'results', 'counts'));
    }

}
