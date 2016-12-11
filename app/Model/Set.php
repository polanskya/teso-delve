<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property bool craftable
 * @property int|null traitNeeded
 * @property string|null description
 * @property mixed id
 */
class Set extends Model
{

    protected $fillable = [

    ];

    public function bonuses() {
       return $this->hasMany(SetBonus::class, 'setId');
    }

    public function dungeons() {
        return $this->belongsToMany(Dungeon::class, 'dungeon_sets', 'setId', 'dungeonId');
    }

}
