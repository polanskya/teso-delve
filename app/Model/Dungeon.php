<?php

namespace App\Model;

use App\Model\Zone;
use App\Enum\DLC;

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
 * @property null type
 * @property mixed zone_id
 * @property int groupSize
 * @property null alliance
 */
class Dungeon extends Model
{
    use Sluggify;
    protected $table = 'dungeons_new';

    protected $sluggify = [
        'slugs' => ['slug' => 'name'],
        'routeKey' => 'slug',
    ];

    protected $fillable = [

    ];

    public function getNameSanitizedAttribute() {
        return str_ireplace("'", '', $this->name);
    }
    public function getDlcLabel() {
        return $this->dlc == DLC::DLC_BASE_GAME ? '' :  DLC::getDlcLabel($this->dlc) ;
    }


    public function sets() {
        return $this->belongsToMany(Set::class, 'dungeon_sets', 'dungeonId', 'setId');
    }

    public function bosses() {
        return $this->hasMany(Boss::class);
    }

    /*
         * @param  string  $related
     * @param  string  $foreignKey
     * @param  string  $ownerKey
     * @param  string  $relation
     * */
    public function zone() {
        return  $this->belongsTo(Zone::class);
        //$zoneObject = new Zones();
       // return is_null($this->getAttribute('zone')) ? null : $zoneObject->getZone($this->getAttribute('zone'));
    }
    //select * from "bosses" where "bosses"."dungeon_id //, 'id', 'zone'
}
