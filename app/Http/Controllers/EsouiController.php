<?php namespace App\Http\Controllers;


use Carbon\Carbon;

class EsouiController
{

    public function image($image) {

        $dir = 'esoui/art/icons';
        $subPath = $dir.'/'. str_ireplace('.dds', '.png', $image);
        $url = 'http://esoicons.uesp.net/' . $subPath;

        if(!file_exists(storage_path($subPath))) {
            $imageData = $content = file_get_contents($url);
            if(!is_dir(storage_path($dir))) {
                mkdir($dir);
            }

            file_put_contents(storage_path($subPath), $imageData);
        }

        header('Content-Type: image/png');
        header("Cache-Control: max-age=" . Carbon::now()->addHours(5)); //30days (60sec * 60min * 24hours * 30days)
        echo file_get_contents(storage_path($subPath));
        die();
    }

}