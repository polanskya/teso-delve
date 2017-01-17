<?php namespace App\Http\Controllers;


use App\Model\Item;
use App\Model\ItemStyle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class StyleController
{

    public function index() {
        $itemStyles = ItemStyle::where('isHidden', 0)->orderBy('name')->get();

        $helmets = Cache::remember('example-style-helmets', 60*12, function() {
            $helmets_sorted = new Collection();
            $helmets = Item::where('equipType', 1)->whereNotNull('itemStyleId')->get();
            foreach($helmets->groupBy('itemStyleId') as $itemStyleId => $helmetPerStyle) {
                $helmetsItemStyle = new Collection();

                $helmetsPerArmorType = $helmetPerStyle->groupBy('armorType');
                foreach($helmetsPerArmorType as $armorTypeId => $helmetsList) {
                    $helmetsItemStyle->put($armorTypeId, $helmetsList->first());
                }

                $helmets_sorted->put($itemStyleId, $helmetsItemStyle);
            }

            return $helmets_sorted;
        });

        return view('item-styles.index', compact('itemStyles', 'helmets'));
    }

    public function show(ItemStyle $itemStyle) {
        $itemStyle->load('chapters.item');

        $armors = Cache::remember('armor-examples-' . $itemStyle->id, 120, function () use ($itemStyle) {
            $items = Item::where('itemStyleId', $itemStyle->id)->get();
            return $items->where('armorType', '!=', 0)->groupBy('armorType');
        });

        $weapons = Cache::remember('weapons-examples-' . $itemStyle->id, 120, function () use ($itemStyle) {
            $items = Item::where('itemStyleId', $itemStyle->id)->get();
            return $items->where('weaponType', '!=', 0)->groupBy('weaponType');
        });

        $images = [];
        $images_dir = public_path('gfx/item-style/' . $itemStyle->id);
        if(is_dir($images_dir)) {
            $images_files = scandir($images_dir);
            $images_files = array_slice($images_files, 2);
            foreach($images_files as $img) {
                $name = explode('-', $img);
                $images[$name[0]][$name[1]][$name[2]][] = $img;
            }
        }

        return view('item-styles.show', compact('itemStyle', 'images', 'armors', 'weapons'));
    }

}
