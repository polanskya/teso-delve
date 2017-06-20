<?php

use Carbon\Carbon;

if(!function_exists('carbon')) {

    function carbon($date) {
        $format = 'Y-m-d';

        if(stripos($date, '/') !== false) {
            $format = 'd/m/y';
        }

        return Carbon::createFromFormat($format, $date);
    }

}
