<?php namespace App\Objects;

use App\Enum\Alliance;

class Zones
{
    private $zones = [
        /** Aldmeri Dominion **/
        1 => ['name' => 'Auridon', 'Alliance' => Alliance::ALDMERI_DOMINION],
        2 => ['name' => 'Grahtwood', 'Alliance' => Alliance::ALDMERI_DOMINION],
        3 => ['name' => 'Greenshade', 'Alliance' => Alliance::ALDMERI_DOMINION],
        4=> ['name' => 'Khenarthi\'s Roost', 'Alliance' => Alliance::ALDMERI_DOMINION],
        5 => ['name' => 'Malabal Tor', 'Alliance' => Alliance::ALDMERI_DOMINION],
        6 => ['name' => 'Reapers\'s March', 'Alliance' => Alliance::ALDMERI_DOMINION],

        /** Daggerfall Covenant **/
        7 => ['name' => "Alik'r Desert", 'Alliance' => Alliance::DAGGERFALL_COVENANT],
        8 => ['name' => 'Bangkorai', 'Alliance' => Alliance::DAGGERFALL_COVENANT],
        9 => ['name' => 'Betnikh', 'Alliance' => Alliance::DAGGERFALL_COVENANT],
        10 => ['name' => 'Glenumbra', 'Alliance' => Alliance::DAGGERFALL_COVENANT],
        11 => ['name' => 'Rivenspire', 'Alliance' => Alliance::DAGGERFALL_COVENANT],
        12 => ['name' => 'Stormhaven', 'Alliance' => Alliance::DAGGERFALL_COVENANT],
        13 => ['name' => "Stros M'Kai", 'Alliance' => Alliance::DAGGERFALL_COVENANT],

        /** Ebonheart Pact **/
        14 => ['name' => "Bal Foyen", 'Alliance' => Alliance::EBONHEART_PACT],
        15 => ['name' => "Bleakrock Isle", 'Alliance' => Alliance::EBONHEART_PACT],
        16 => ['name' => "Deshaan", 'Alliance' => Alliance::EBONHEART_PACT],
        17 => ['name' => "Eastmarch", 'Alliance' => Alliance::EBONHEART_PACT],
        18 => ['name' => "The Rift", 'Alliance' => Alliance::EBONHEART_PACT],
        19 => ['name' => "Shadowfen", 'Alliance' => Alliance::EBONHEART_PACT],
        20 => ['name' => "Stonefalls", 'Alliance' => Alliance::EBONHEART_PACT],

        /** Neutral **/
        21 => ['name' => "Coldharbour", 'Alliance' => Alliance::NEUTRAL],
        22 => ['name' => "Craglorn", 'Alliance' => Alliance::NEUTRAL],
        23 => ['name' => "Cyrodiil", 'Alliance' => Alliance::NEUTRAL],
        24 => ['name' => "Gold Coast", 'Alliance' => Alliance::NEUTRAL],
        25 => ['name' => "Hew's Bane", 'Alliance' => Alliance::NEUTRAL],
        26 => ['name' => "Murkmire", 'Alliance' => Alliance::NEUTRAL],
        27 => ['name' => "Wrothgar", 'Alliance' => Alliance::NEUTRAL],

    ];

    public function getZone($zoneId) {
        return $this->zones[$zoneId];
    }

    public function getZones() {
        return $this->zones;
    }

    public function getZonesByAlliance() {
        $zones = $this->getZones();

        $zonesByAlliance = [
            Alliance::ALDMERI_DOMINION => [],
            Alliance::EBONHEART_PACT => [],
            Alliance::DAGGERFALL_COVENANT => [],
            Alliance::NEUTRAL => [],
        ];
        foreach($zones as $key => $zone) {
            $zonesByAlliance[$zone['Alliance']][$key] = $zone;
        }

        return $zonesByAlliance;
    }

}

