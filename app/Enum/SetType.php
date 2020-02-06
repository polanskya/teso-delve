<?php

namespace App\Enum;

use ReflectionClass;

class SetType
{
    const MONSTER = 1;
    const ZONE = 2;
    const DUNGEON = 3;
    const CRAFTED = 4;

    public static function all()
    {
        $oClass = new ReflectionClass(__CLASS__);

        return $oClass->getConstants();
    }
}
