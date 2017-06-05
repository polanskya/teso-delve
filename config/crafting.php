<?php

use App\Enum\Quality;

return [


    'quality' => [

        Quality::NORMAL => [
            'tempers' => null,
        ],

        Quality::FINE => [
            'tempers' => 2,
        ],

        Quality::SUPERIOR => [
            'tempers' => 3,
        ],

        Quality::EPIC => [
            'tempers' => 4,
        ],

        Quality::LEGENDARY => [
            'tempers' => 8,
        ],

    ]

];
