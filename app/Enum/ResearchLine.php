<?php namespace App\Enum;


class ResearchLine
{

    // Blacksmithing
    const Axe = 1;
    const Mace = 2;
    const Sword = 3;
    const Battle_Axe = 4;
    const Maul = 5;
    const Greatsword = 6;
    const Dagger = 7;
    const Cuirass = 8;
    const Sabatons = 9;
    const Gauntlets = 10;
    const Helm = 11;
    const Greaves = 12;
    const Pauldron = 13;
    const Girdle = 14;

    // Clothing
    const Robe_AND_Jerkin = 1;
    const Shoes = 2;
    const Gloves = 3;
    const Hat = 4;
    const Breeches = 5;
    const Epaulets = 6;
    const Sash = 7;
    const Jack = 8;
    const Boots = 9;
    const Bracers = 10;
    const Helmet = 11;
    const Guards = 12;
    const Arm_Cops = 13;
    const Belt = 14;

    // Woodworking
    const Bow = 1;
    const Inferno_Staff = 2;
    const Ice_Staff = 3;
    const Lightning_Staff = 4;
    const Restoration_Staff = 5;
    const Shield = 6;

    //JC 
    const RING = 1;
    const NECK = 2;

    public static function blacksmithingGrouped() {
        $weapons = [
            self::Axe,
            self::Mace,
            self::Sword,
            self::Battle_Axe,
            self::Maul,
            self::Greatsword,
            self::Dagger,
        ];

        $armors = [
            self::Cuirass,
            self::Sabatons,
            self::Gauntlets,
            self::Helm,
            self::Greaves,
            self::Pauldron,
            self::Girdle,
        ];


        return ['armors' => $armors, 'weapons' => $weapons];
    }

    public static function blacksmithing() {

        return [
            self::Axe,
            self::Mace,
            self::Sword,
            self::Battle_Axe,
            self::Maul,
            self::Greatsword,
            self::Dagger,
            self::Cuirass,
            self::Sabatons,
            self::Gauntlets,
            self::Helm,
            self::Greaves,
            self::Pauldron,
            self::Girdle,
        ];

    }

    public static function clothing($armorType = ArmorType::LIGHT) {
        if($armorType == ArmorType::LIGHT) {
            return [
                self::Robe_AND_Jerkin,
                self::Shoes,
                self::Gloves,
                self::Hat,
                self::Breeches,
                self::Epaulets,
                self::Sash,
            ];
        }

        return [
            self::Jack,
            self::Boots,
            self::Bracers,
            self::Helmet,
            self::Guards,
            self::Arm_Cops,
            self::Belt,
        ];
    }


}