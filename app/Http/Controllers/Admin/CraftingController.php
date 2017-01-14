<?php namespace App\Http\Controllers\Admin;

use App\Enum\BagType;
use App\Enum\ItemStyleChapter;
use App\Http\Controllers\Controller;
use App\Model\Item;
use App\Model\ItemStyle;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CraftingController extends Controller
{

    public function itemStyles() {
        $itemStyles = ItemStyle::all();
        $chapters = ItemStyleChapter::order();
        $motifs = Item::where('type', 8)->orderBy('name')->get();

        return view('admin.crafting.itemStyles', compact('itemStyles', 'chapters', 'motifs'));
    }

    public function itemStyle(ItemStyle $itemStyle) {
        $motifs = Item::where('type', 8)->where('name', 'like', '%'.$itemStyle->externalId.'%')->orderBy('name')->get();
        return view('admin.crafting.itemStyle', compact('itemStyle', 'motifs'));
    }

    public function updateItemStyle(Request $request, ItemStyle $itemStyle) {
        $data = $request->get('itemStyle');

        $itemStyle->name = $data['name'];
        $itemStyle->location = $data['location'];
        $itemStyle->isHidden = isset($data['isHidden']);
        $itemStyle->craftable = isset($data['craftable']);
        $itemStyle->save();

        return redirect()->route('admin.crafting.item-style.edit', [$itemStyle]);
    }

    public function updateStyles(Request $request) {
        $itemStyles = ItemStyle::all();
        foreach($request->get('itemStyle') as $id => $data) {
            /** @var ItemStyle $itemStyle */
            $itemStyle = $itemStyles->where('id', $id)->first();
            $itemStyle->name = $data['name'];
            $itemStyle->craftable = isset($data['craftable']);
            $itemStyle->save();
        }

        return redirect()->back();
    }


}
