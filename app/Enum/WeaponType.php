<?php

namespace App\Enum;

class WeaponType
{
    const Axe = 1;
    const Bow = 8;
    const Dagger = 11;
    const Fire_staff = 12;
    const Frost_staff = 13;
    const Hammer = 2;
    const Healing_staff = 9;
    const Lightning_staff = 15;
    const Shield = 14;
    const Sword = 3;
    const Twoh_Axe = 5;
    const Twoh_Hammer = 6;
    const Twoh_Sword = 4;

    public static function craftingType($craftingType)
    {
        if ($craftingType == CraftingType::BLACKSMITHING) {
            return [
                self::Axe,
                self::Dagger,
                self::Hammer,
                self::Sword,
                self::Twoh_Axe,
                self::Twoh_Hammer,
                self::Twoh_Sword,
            ];
        }

        if ($craftingType == CraftingType::WOODWORKING) {
            return [
                self::Bow,
                self::Fire_staff,
                self::Lightning_staff,
                self::Frost_staff,
                self::Healing_staff,
                self::Shield,
            ];
        }

        return [];
    }
}
