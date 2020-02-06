<?php

namespace App\Presenter;

abstract class StringPresenter
{
    public static function nl2br($string)
    {
        return str_ireplace(['\r\n', '\r', '\n'], '<br />', htmlspecialchars($string));
    }

    public static function ColorReplace($string)
    {
        $string = preg_replace('(\|r)', '', $string);
        $string = preg_replace('(\|\w{7})', '', $string);

        return self::nl2br($string);
    }
}
