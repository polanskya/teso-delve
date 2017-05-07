<?php namespace App\Observers;

use App\Model\Item;

class ItemObserver
{

    public function created(Item $item) {
        $slug = $item->slug;
        $item->generateSlug();

        if($item->slug != $slug) {
            $item->save();
        }
    }

}