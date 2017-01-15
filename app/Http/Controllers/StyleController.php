<?php namespace App\Http\Controllers;


use App\Model\ItemStyle;

class StyleController
{

    public function index() {
        $itemStyles = ItemStyle::where('isHidden', 0)->orderBy('name')->get();
        return view('item-styles.index', compact('itemStyles'));
    }

    public function show(ItemStyle $itemStyle) {
        $itemStyle->load('chapters.item');

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

        return view('item-styles.show', compact('itemStyle', 'images'));
    }

}
