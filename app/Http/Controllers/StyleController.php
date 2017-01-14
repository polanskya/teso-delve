<?php namespace App\Http\Controllers;


use App\Model\ItemStyle;

class StyleController
{

    public function index() {
        $itemStyles = ItemStyle::where('isHidden', 0)->orderBy('name')->get();
        return view('item-styles.index', compact('itemStyles'));
    }

    public function show(ItemStyle $itemStyle) {
        return view('item-styles.show', compact('itemStyle'));
    }

}
