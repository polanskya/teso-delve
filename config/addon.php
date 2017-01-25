<?php
return [
    'github' => [
        'opts' => [
            'http' => [
                'method' => 'GET',
                'header' => [
                    'User-Agent: PHP'
                ]
            ]
        ],
        'repo-url' => 'https://api.github.com/repos/heppykarlsson/teso-delve-addon/releases/latest',
        'repo' => 'teso-delve-addon',
        'owner' => 'heppykarlsson',
        'cache-time' => 1 * 60 // in minutes
    ]
];