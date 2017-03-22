<?php namespace App\Http\Controllers;


use Carbon\Carbon;

class EsouiController
{

    public function image($image) {

        $dir = 'esoui/art/icons';
        $subPath = $dir.'/'. str_ireplace('.dds', '.png', $image);

        if(!file_exists(storage_path($subPath))) {
            $url = 'http://esoicons.uesp.net/' . $subPath;
            $imageData = $content = file_get_contents($url);
            if(!is_dir(storage_path($dir))) {
                mkdir($dir);
            }

            file_put_contents(storage_path($subPath), $imageData);
        }

        $expiration = Carbon::now()->addDays(7);
        header('Pragma: public');
        header("Cache-Control: max-age=" . Carbon::now()->diffInSeconds($expiration));
        header('Expires: '. $expiration->toRfc1123String());
        header('Content-Type: image/png');
        $content = file_get_contents(storage_path($subPath));
        echo $content;

        die();
    }

}