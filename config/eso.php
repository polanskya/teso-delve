<?php

return [
    'mm-import' => [
        'days-back' => env('MM_IMPORT_DAYS', 31),
    ],
    'champion-level' => [
        'gear-max' => 160,
    ],
    'server-status' => [
        'url' => 'https://live-services.elderscrollsonline.com/status/realms',
        'cache' => 5,
    ],
    'search' => env('SITE-SEARCH', false),
];
