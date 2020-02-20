<?php namespace App\Model;

use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Model;
use App\Enum\Alliance;
/**
 * @property int parent_zone_id
 * @property mixed name
 * @property int dlc
 * @property int aliance
 *
 */
class Zone extends Model
{
    use Sluggify;
    protected $table = 'zones';
    protected $sluggify = [
        'slugs' => [
            'slug' => 'name'
        ],
        'routeKey' => 'slug',
    ];

    function isParent() {
        return ($this->id ==$this->parent_zone_id);
    }
    public function getZoneBySlug($slug) {
        return Zone::where('slug', $slug)->first();
    }

    public function getZonesByAlliance() {
        $zones = Zone::orderBy('alliance')->get();
        //$zones = $zones->orderByRaw('alianceEnum');
       
        $zonesByAlliance = [
            Alliance::ALDMERI_DOMINION => [],
            Alliance::EBONHEART_PACT => [],
            Alliance::DAGGERFALL_COVENANT => [],
            Alliance::NEUTRAL => [],
        ];
        foreach($zones as $key => $zone) {
            if ($zone->isParent()) {
                $zonesByAlliance[$zone['alliance']][$key] = $zone;
            }
        }

        return $zonesByAlliance;
    }
}