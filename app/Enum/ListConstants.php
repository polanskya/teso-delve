<?php namespace App\Enum;

use Exception;
use ReflectionClass;

trait ListConstants
{
    public static function constants() {
        $refl = new ReflectionClass(get_called_class());
        return $refl->getConstants();
    }
    /*
    public static function getConstant($constant) {
        $constants = self::constants();
        if(array_key_exists($constant, $constants)) {
            return $constants[$constant];
        }
        throw new Exception("Constant: $constant not found in " . get_called_class());
    }*/

    public static function getConstant($const) {
        $class = new ReflectionClass(__CLASS__);
        $constants = array_flip($class->getConstants());
  
        return $constants[$const];
     }
 
     public static function getLabel($const) {
        $rawLabel = self::getConstant($const);
        $rawLabel = mb_convert_case(str_replace('_',' ',$rawLabel),MB_CASE_TITLE, "UTF-8");
        return trim($rawLabel);
     }
     
}