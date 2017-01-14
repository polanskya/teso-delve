<?php

namespace App\Model;

use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Collection sets
 */
class Dungeon extends Model
{
    use Sluggify;

    protected $sluggify = [
        'slugs' => ['slug' => 'name'],
        'routeKey' => 'slug',
    ];

    protected $fillable = [

    ];

    public function getNameSanitizedAttribute() {
        return str_ireplace("'", '', $this->name);
    }

    public function sets() {
        return $this->belongsToMany(Set::class, 'dungeon_sets', 'dungeonId', 'setId');
    }

}
