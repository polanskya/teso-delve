<?php

namespace App\Model;

use HeppyKarlsson\Meta\Traits\Meta;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property bool craftable
 * @property int|null traitNeeded
 * @property string|null description
 * @property mixed id
 * @property int setTypeEnum
 */
class Set extends Model
{
    use Meta;

    protected $fillable = [

    ];

    public function bonuses() {
       return $this->hasMany(SetBonus::class, 'setId');
    }

    public function dungeons() {
        return $this->belongsToMany(Dungeon::class, 'dungeon_sets', 'setId', 'dungeonId');
    }

    public function zones() {
        return $this->hasMany(ZoneSet::class, 'setId');
    }

}
