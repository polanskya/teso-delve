<?php
/**
 * Created by PhpStorm.
 * User: Heppy
 * Date: 2017-01-01
 * Time: 16:48.
 */

namespace App\Presenter;

use Carbon\Carbon;

class Date
{
    public static function untilDate($date)
    {
        $return = Carbon::now()->diffForHumans($date, 2);

        return "<span title='".$date->format('Y-m-d')."'>".$return.'</span>';
    }

    public static function until($date)
    {
        $return = Carbon::now()->diffForHumans($date, 2);

        return "<span title='$date'>".$return.'</span>';
    }
}
