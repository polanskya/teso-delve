<?php

namespace App\Model;

use App\Objects\Zones;
use Illuminate\Database\Eloquent\Model;

class ZoneSet extends Model
{
    protected $fillable = [];
    public $timestamps = false;

    public function getZoneInfo()
    {
        $zones = new Zones();

        return $zones->getZone($this->zoneId);
    }

    public function sets()
    {
        return $this->hasOne(Set::class, 'id', 'setId');
    }

    public function getNameAttribute()
    {
        return $this->getZoneInfo()['name'];
    }
}
