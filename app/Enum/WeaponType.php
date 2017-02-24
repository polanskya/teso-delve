<?php namespace App\Enum;

class WeaponType
{

    CONST Axe = 1;
    CONST Bow = 8;
    CONST Dagger = 11;
    CONST Fire_staff = 12;
    CONST Frost_staff = 13;
    CONST Hammer =  2;
    CONST Healing_staff = 9;
    CONST Lightning_staff = 15;
    CONST Shield = 14;
    CONST Sword = 3;
    CONST Twoh_Axe = 5;
    CONST Twoh_Hammer = 6;
    CONST Twoh_Sword = 4;

    static public function craftingType($craftingType) {

        if($craftingType == CraftingType::BLACKSMITHING) {
            return [
                self::Axe,
                self::Dagger,
                self::Hammer,
                self::Sword,
                self::Twoh_Axe,
                self::Twoh_Hammer,
                self::Twoh_Sword
            ];
        }

        if($craftingType == CraftingType::WOODWORKING) {
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
