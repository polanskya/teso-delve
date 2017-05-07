<?php namespace HeppyKarlsson\BanHammer;

use HeppyKarlsson\BanHammer\Throwable\AutoBanned;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BanHammer
{

    static public function ban($ip) {
        $banhammerConf = self::getBans();
        $banhammerConf['perm-bans'][] = trim($ip);
        self::write($banhammerConf);
        return true;
    }

    static public function autoBan($ip) {
        self::ban($ip);
        throw new AutoBanned('IP: ' . $ip . " has been autobanned from BanHammer::scan()");
    }

    public static function isBanned($ip) {
        $bans = self::bans();
        return in_array($ip, $bans);
    }

    public static function bans() {
        $bans = self::getBans();
        return $bans['perm-bans'];
    }

    private static function getBans() {
        $file = storage_path('app/banhammer.php');
        if(!file_exists($file)) {
            return include(__DIR__ . "/Config/banhammer.php");
        }

        return include($file);
    }

    private static function write($bans) {
        $bans['perm-bans'] = array_unique($bans['perm-bans']);
        File::put(storage_path('app/banhammer.php'), "<?php \n\nreturn " . var_export($bans, true) . ";");
    }

    static public function unban($ip) {
        $remove = [$ip];
        $bans = self::getBans()['perm-bans'];
        $bans['perm-bans'] = array_diff($bans, $remove);
        self::write($bans);
    }

    static public function scan($exception) {
        $request = request();
        if($exception instanceof NotFoundHttpException) {
            $path = $request->path();
            $exploded = explode('.', $path);
            $explodeCount = count($exploded) - 1;


            if(stripos($path, 'mysql') !== false) {
                self::autoBan($request->ip());
            }

            if(stripos($path, 'proxy') !== false) {
                self::autoBan($request->ip());
            }

            if(stripos($path, 'phpmyadmin') !== false) {
                self::autoBan($request->ip());
            }

            if(stripos($path, 'cgi-bin/php') !== false) {
                self::autoBan($request->ip());
            }

            if($explodeCount == 0) {
                return true;
            }


            if($exploded[$explodeCount] == 'sql') {
                self::autoBan($request->ip());
            }

            if($exploded[$explodeCount-1] == 'sql') {
                self::autoBan($request->ip());
            }

            if($exploded[$explodeCount] == 'tar') {
                self::autoBan($request->ip());
            }

            if($exploded[$explodeCount] == 'tgz') {
                self::autoBan($request->ip());
            }



        }

    }


}