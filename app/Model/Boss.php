<?php namespace App\Model;

use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed dungeon_id
 * @property mixed zone_id
 * @property string name
 * @property string strategy
 * @property string mechanics
 * @property string description
 * @property int|null order
 */
class Boss extends Model
{
    use Sluggify;

    protected $sluggify = [
        'slugs' => ['slug' => 'name'],
        'routeKey' => 'slug',
    ];

    public $timestamps = false;

}
