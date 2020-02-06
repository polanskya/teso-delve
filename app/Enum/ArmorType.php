<?php

namespace App\Enum;

class ArmorType
{
    const HEAVY = 3;
    const MEDIUM = 2;
    const LIGHT = 1;

    public static function craftingType($craftingTypeEnum)
    {
        if ($craftingTypeEnum == CraftingType::BLACKSMITHING) {
            return [self::HEAVY];
        }

        if ($craftingTypeEnum == CraftingType::CLOTHIER) {
            return [self::LIGHT, self::MEDIUM];
        }

        return [];
    }
}
