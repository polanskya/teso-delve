<?php

namespace App\Model;

use App\Enum\EquipType;
use App\Enum\ItemType;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Collection sets
 */
class Dungeon extends Model
{

    use Sluggable,
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

    public function sets() {
        return $this->belongsToMany(Set::class, 'dungeon_sets', 'dungeonId', 'setId');
    }

}
