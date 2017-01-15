<?php namespace App\Model;

use HeppyKarlsson\Meta\Traits\Meta;
use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Model;

class ItemStyleChapter extends Model
{

    public $table = 'itemStyle_chapter';

    public $timestamps = false;

    public function item() {
        return $this->hasOne(Item::class, 'id', 'itemId');
    }

}
