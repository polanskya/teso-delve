<?php

namespace App\Model;

use App\Objects\Zones;
use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Collection sets
 * @property Collection bosses
 * @property string name
 * @property string guide
 * @property string image
 * @property string description
 * @property null dungeonTypeEnum
 * @property null zone
 * @property int groupSize
 * @property null alliance
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

    public function getNameSanitizedAttribute()
    {
        return str_ireplace("'", '', $this->name);
    }

    public function sets()
    {
        return $this->belongsToMany(Set::class, 'dungeon_sets', 'dungeonId', 'setId');
    }

    public function bosses()
    {
        return $this->hasMany(Boss::class);
    }

    public function zone()
    {
        $zoneObject = new Zones();

        return is_null($this->getAttribute('zone')) ? null : $zoneObject->getZone($this->getAttribute('zone'));
    }
}
