<?php namespace App\Enum;


class ItemType
{
    const ADDITIVE = 11;
    const ARMOR = 2;
    const ARMOR_BOOSTER = 24;
    const ARMOR_TRAIT = 45;
    const AVA_REPAIR = 47;
    const BLACKSMITHING_BOOSTER = 41;
    const BLACKSMITHING_MATERIAL = 36;
    const BLACKSMITHING_RAW_MATERIAL = 35;
    const CLOTHIER_BOOSTER = 43;
    const CLOTHIER_MATERIAL = 40;
    const CLOTHIER_RAW_MATERIAL = 39;
    const COLLECTIBLE = 34;
    const CONTAINER = 18;
    const COSTUME = 13;
    const CROWN_ITEM = 57;
    const CROWN_REPAIR = 55;
    const DEPRECATED = 32;
    const DISGUISE = 14;
    const DRINK = 12;
    const DYE_STAMP = 59;
    const ENCHANTING_RUNE_ASPECT = 52;
    const ENCHANTING_RUNE_ESSENCE = 53;
    const ENCHANTING_RUNE_POTENCY = 51;
    const ENCHANTMENT_BOOSTER = 25;
    const FISH = 54;
    const FLAVORING = 28;
    const FOOD = 4;
    const GLYPH_ARMOR = 21;
    const GLYPH_JEWELRY = 26;
    const GLYPH_WEAPON = 20;
    const INGREDIENT = 10;
    const LOCKPICK = 22;
    const LURE = 16;
    const MAX_VALUE = 59;
    const MIN_VALUE = 0;
    const MOUNT = 50;
    const NONE = 0;
    const PLUG = 3;
    const POISON = 30;
    const POISON_BASE = 58;
    const POTION = 7;
    const POTION_BASE = 33;
    const RACIAL_STYLE_MOTIF = 8;
    const RAW_MATERIAL = 17;
    const REAGENT = 31;
    const RECIPE = 29;
    const SIEGE = 6;
    const SOUL_GEM = 19;
    const SPELLCRAFTING_TABLET = 49;
    const SPICE = 27;
    const STYLE_MATERIAL = 44;
    const TABARD = 15;
    const TOOL = 9;
    const TRASH = 48;
    const TREASURE = 56;
    const TROPHY = 5;
    const WEAPON = 1;
    const WEAPON_BOOSTER = 23;
    const WEAPON_TRAIT = 46;
    const WOODWORKING_BOOSTER = 42;
    const WOODWORKING_MATERIAL = 38;
    const WOODWORKING_RAW_MATERIAL = 37;

    static public function consumables() {
        return [
            self::POTION,
            self::FOOD,
            self::POISON,
            self::CONTAINER,
            self::RECIPE,
            self::DRINK,
            self::RACIAL_STYLE_MOTIF,
        ];
    }

    static public function material($craftingTypeEnum) {
        if($craftingTypeEnum == CraftingType::BLACKSMITHING) {
            return self::BLACKSMITHING_MATERIAL;
        }

        if($craftingTypeEnum == CraftingType::CLOTHIER) {
            return self::CLOTHIER_MATERIAL;
        }

        if($craftingTypeEnum == CraftingType::WOODWORKING) {
            return self::WOODWORKING_MATERIAL;
        }

        throw new \Exception('No material found for: ' . $craftingTypeEnum);
    }

    static public function materials() {
        return [
            self::RAW_MATERIAL,
            self::WOODWORKING_MATERIAL,
            self::WOODWORKING_RAW_MATERIAL,
            self::BLACKSMITHING_MATERIAL,
            self::BLACKSMITHING_RAW_MATERIAL,
            self::ENCHANTING_RUNE_ASPECT,
            self::ENCHANTING_RUNE_ESSENCE,
            self::ENCHANTING_RUNE_POTENCY,
            self::CLOTHIER_MATERIAL,
            self::CLOTHIER_RAW_MATERIAL,
            self::WEAPON_TRAIT,
            self::ARMOR_TRAIT,
            self::REAGENT,
            self::INGREDIENT,
        ];
    }


    static public function misc() {
        return [
            self::WEAPON_BOOSTER,
            self::TABARD,
            self::TOOL,
            self::TROPHY,
            self::TREASURE,
            self::SPICE,
            self::SIEGE,
            self::LOCKPICK,
            self::ADDITIVE,
            self::COLLECTIBLE,
            self::DISGUISE,
            self::MOUNT,
            self::PLUG,
        ];
    }


};