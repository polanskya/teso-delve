<?php

namespace App\Enum;

use Exception;
use ReflectionClass;

trait ListConstants
{
    public static function constants()
    {
        $refl = new ReflectionClass(get_called_class());

        return $refl->getConstants();
    }

    public static function getConstant($constant)
    {
        $constants = self::constants();
        if (array_key_exists($constant, $constants)) {
            return $constants[$constant];
        }
        throw new Exception("Constant: $constant not found in ".get_called_class());
    }
}
