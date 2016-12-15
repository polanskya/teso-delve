<?php
    $description = strip_tags($bonus->description);

    $search = [
        '[n]',
        '[/n]',
        'max health',
        'health recovery',
        'healing taken',
        'max stamina',
        'stamina recovery',
        'max magicka',
        'magicka recovery',
    ];

    $replace = [
        '<span class="number">',
        '</span>',
        '<span class="health">Max Health</span>',
        '<span class="health">Health Recovery</span>',
        '<span class="health">Healing Taken</span>',
        '<span class="stamina">Max Stamina</span>',
        '<span class="stamina">Stamina Recovery</span>',
        '<span class="magicka">Max Magicka</span>',
        '<span class="magicka">Magicka Recovery</span>',
    ];

    $description = str_ireplace($search, $replace, $description);

    echo $description;