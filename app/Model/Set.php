<?php namespace App\Model;

use HeppyKarlsson\Meta\Traits\Meta;
use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property bool craftable
 * @property int|null traitNeeded
 * @property string|null description
 * @property mixed id
 * @property int setTypeEnum
 * @property mixed lang
 * @property string external_id
 */
class Set extends Model
{
    use Meta,
        Sluggify;

    protected $sluggify = [
        'slugs' => [
            'slug' => 'name'
        ],
        'routeKey' => 'slug',
    ];

    protected $fillable = [

    ];

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
