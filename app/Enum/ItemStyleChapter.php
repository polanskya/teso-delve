<?php

namespace App\Enum;

class ItemStyleChapter
{
    const ALL = 0;
    const AXES = 10;
    const BELTS = 6;
    const BOOTS = 3;
    const BOWS = 14;
    const CHESTS = 5;
    const DAGGERS = 11;
    const GLOVES = 2;
    const HELMETS = 1;
    const LEGS = 4;
    const MACES = 9;
    const SHIELDS = 13;
    const SHOULDERS = 7;
    const STAVES = 12;
    const SWORDS = 8;

    public static function order()
    {
        return [
            self::ALL,
            self::AXES,
            self::BELTS,
            self::BOOTS,
            self::BOWS,
            self::CHESTS,
            self::DAGGERS,
            self::GLOVES,
            self::HELMETS,
            self::LEGS,
            self::MACES,
            self::SHIELDS,
            self::SHOULDERS,
            self::STAVES,
            self::SWORDS,
        ];
    }
}
