<?php

use Carbon\Carbon;

if(!function_exists('carbon')) {

    function carbon($date) {
        $format = 'Y-m-d';

        if(stripos($date, '/') !== false) {
            $explode = explode('/', $date);
            $format = 'd/m/y';

            if(strlen($explode[2]) == 4) {
                $format = 'd/m/Y';
            }
        }

        try {
            return Carbon::createFromFormat($format, $date);
        }
        catch(Exception $e) {
            throw new Exception('Carbon unable to parse: ' . $date . " (format: " . $format . ")");
        }
    }

}
