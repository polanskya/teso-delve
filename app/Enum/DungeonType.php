<?php namespace App\Enum;


class DungeonType
{

    const GROUP_DUNGEON = 1;
    const PUBLIC_DUNGEON = 2;
    const DELVE = 3;
    const TRIAL = 4;

    static public function all() {
        return [self::GROUP_DUNGEON, self::PUBLIC_DUNGEON, self::DELVE, self::TRIAL];
    }

};