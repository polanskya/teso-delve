<?php

namespace App\Model;

use App\Enum\EquipType;
use App\Enum\ItemType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Collection sets
 */
class Dungeon extends Model
{

    protected $fillable = [

    ];

    public function sets() {
        return $this->belongsToMany(Set::class, 'dungeon_sets', 'dungeonId', 'setId');
    }

}
