<?php namespace HeppyKarlsson\BanHammer\Middleware;

use Closure;
use HeppyKarlsson\BanHammer\BanHammer as BanHammerService;
use HeppyKarlsson\BanHammer\Throwable\AccessDenied;
use HeppyKarlsson\DBLogger\Facade\DBLogger;

class BanHammer
{

    public function handle($request, Closure $next, $guard = null)
    {

        if(BanHammerService::isBanned($request->ip())) {
            DBLogger::save(new AccessDenied('Permanently banned IP tried to access website.'));
            return response()->view('errors.perm-ban')->setStatusCode(403);
        }

        return $next($request);
    }
}
