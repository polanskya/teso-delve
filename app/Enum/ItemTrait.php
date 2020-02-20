<?php
/**
 * Created by PhpStorm.
 * User: Heppy
 * Date: 2016-12-04
 * Time: 15:13
 */

namespace App\Enum;


class ItemTrait
{
    const ARMOR_DIVINES = 18;
    const ARMOR_EXPLORATION = 17;
    const ARMOR_IMPENETRABLE = 12;
    const ARMOR_INFUSED = 16;
    const ARMOR_INTRICATE = 20;
    const ARMOR_NIRNHONED = 25;
    const ARMOR_ORNATE = 19;
    const ARMOR_PROSPEROUS = 17;
    const ARMOR_REINFORCED = 13;
    const ARMOR_STURDY = 11;
    const ARMOR_TRAINING = 15;
    const ARMOR_WELL_FITTED = 14;
    
    const JEWELRY_ARCANE = 22;
    const JEWELRY_HEALTHY = 21;
    const JEWELRY_ORNATE = 24;
    const JEWELRY_ROBUST = 23;


    const JEWELRY_BLOODTHIRSTY=31;
    const JEWELRY_HARMONY=29;
    const JEWELRY_INFUSED=33;
    const JEWELRY_INTRICATE=27;
    const JEWELRY_PROTECTIVE=32;
    const JEWELRY_SWIFT=28;
    const JEWELRY_TRIUNE=30;


    const NONE =0;
    const SPECIAL_STAT = 27;
    const WEAPON_CHARGED = 2;
    const WEAPON_DECISIVE = 8;
    const WEAPON_DEFENDING = 5;
    const WEAPON_INFUSED = 4;
    const WEAPON_INTRICATE = 9;
    const WEAPON_NIRNHONED = 26;
    const WEAPON_ORNATE = 10;
    const WEAPON_POWERED = 1;
    const WEAPON_PRECISE = 3;
    const WEAPON_SHARPENED = 7;
    const WEAPON_TRAINING = 6;
    const WEAPON_WEIGHTED = 8;


    /**
     *
     */
    static public function matris($craftingTypeEnum = null) {
        if($craftingTypeEnum == CraftingType::CLOTHIER) {
            return [
                self::ARMOR_STURDY,
                self::ARMOR_IMPENETRABLE,
                self::ARMOR_REINFORCED,
                self::ARMOR_WELL_FITTED,
                self::ARMOR_TRAINING,
                self::ARMOR_INFUSED,
                self::ARMOR_PROSPEROUS,
                self::ARMOR_DIVINES,
                self::ARMOR_NIRNHONED
            ];
        }

        if($craftingTypeEnum == CraftingType::JEWELRYCRAFTING) {
            return [
                self::JEWELRY_ARCANE,
                self::JEWELRY_HEALTHY,
                self::JEWELRY_ROBUST,
                self::JEWELRY_TRIUNE,
                self::JEWELRY_INFUSED,
                self::JEWELRY_PROTECTIVE,
                self::JEWELRY_SWIFT,
                self::JEWELRY_HARMONY,
                self::JEWELRY_BLOODTHIRSTY
            ];
        }

        return [
            self::WEAPON_POWERED,
            self::WEAPON_CHARGED,
            self::WEAPON_PRECISE,
            self::WEAPON_INFUSED,
            self::WEAPON_DEFENDING,
            self::WEAPON_TRAINING,
            self::WEAPON_SHARPENED,
            self::WEAPON_DECISIVE,
            self::WEAPON_NIRNHONED,

            self::ARMOR_STURDY,
            self::ARMOR_IMPENETRABLE,
            self::ARMOR_REINFORCED,
            self::ARMOR_WELL_FITTED,
            self::ARMOR_TRAINING,
            self::ARMOR_INFUSED,
            self::ARMOR_PROSPEROUS,
            self::ARMOR_DIVINES,
            self::ARMOR_NIRNHONED
        ];
    }

};