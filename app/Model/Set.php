<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
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
    use Meta,
        Sluggable,
        SluggableScopeHelpers;

    protected $fillable = [

    ];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'nameSanitized'
            ]
        ];
    }

    public function getNameSanitizedAttribute() {
        return str_ireplace("'", '', $this->name);
    }

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
