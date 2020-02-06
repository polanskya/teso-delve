<?php

namespace App\Enum;

class EquipType
{
    use ListConstants;

    const CHEST = 3;
    const COSTUME = 11;
    const FEET = 10;
    const HAND = 13;
    const HEAD = 1;
    const INVALID = 0;
    const LEGS = 9;
    const MAIN_HAND = 14;
    const MAX_VALUE = 15;
    const MIN_VALUE = 0;
    const NECK = 2;
    const OFF_HAND = 7;
    const ONE_HAND = 5;
    const POISON = 15;
    const RING = 12;
    const SHOULDERS = 4;
    const TWO_HAND = 6;
    const WAIST = 8;

    public static function armors()
    {
        return [
            self::HEAD,
            self::SHOULDERS,
            self::FEET,
            self::HAND,
            self::LEGS,
            self::WAIST,
            self::CHEST,
        ];
    }
}
