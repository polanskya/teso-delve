<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CharacterItemStyle extends Model
{

    public $table = 'character_itemStyle';
    public $timestamps = false;

    public $fillable = [
        'characterId',
        'itemStyleId',
        'itemStyleChapterEnum',
        'isKnown'
    ];

    public function itemStyle() {
        return $this->hasOne(ItemStyle::class, 'id', 'itemStyleId');
    }

}
