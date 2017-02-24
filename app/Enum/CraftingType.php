<?php

namespace App\Enum;

class CraftingType
{

    const ALCHEMY = 4;
    const BLACKSMITHING = 1;
    const CLOTHIER = 2;
    const ENCHANTING = 3;
    const INVALID = 0;
    const PROVISIONING = 5;
    const WOODWORKING = 6;

    static public function smithing() {
        return [self::BLACKSMITHING, self::CLOTHIER, self::WOODWORKING];
    }

};