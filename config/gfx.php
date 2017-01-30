<?php
use App\Enum\DungeonType;

return [

    'dungeonTypes' => [
        DungeonType::GROUP_DUNGEON => '/gfx/group-instance.png',
        DungeonType::PUBLIC_DUNGEON => '/gfx/icons/ON-mapicon-Dungeon.png',
        DungeonType::DELVE => '/gfx/ON-mapicon-Delve.png',
        DungeonType::TRIAL => '/gfx/icons/ON-mapicon-RaidDungeon.png',
        DungeonType::ARENA => '/gfx/icons/ON-mapicon-SoloTrial.png',
    ]
];