<?php namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ServerService
{

    public function serverStatus() {

        $statuses = Cache::remember('eso_server_status', config('eso.server-status.cache'), function() {

            $contents = file_get_contents(config('eso.server-status.url'));
            $servers = json_decode($contents);

            $statuses = [
                'all' => true,
                'servers' => [],
                'date' => Carbon::now(),
            ];

            foreach($servers->zos_platform_response->response as $server => $status) {
                $server = str_ireplace(['The Elder Scrolls Online ', '(', ')'], ['', '', ''], $server);

                if($server == 'PTS') {
                    continue;
                }

                $statuses['servers'][$server] = $status;

                if($status !== 'UP') {
                    $statuses['all'] = false;
                }
            }

            return $statuses;
        });

        return $statuses;
    }

}