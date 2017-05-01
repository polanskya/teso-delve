<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class GuildMember
{

    public function handle($request, Closure $next, $guard = null)
    {
        $user = Auth::user();

        $guild = $request->route()->getParameter('guild');
        $userGuilds = $user->guilds->keyBy('id');

        if(!$userGuilds->has($guild->id) and !$user->hasRole('admin')) {
            abort(Response::HTTP_UNAUTHORIZED, 'You are not apart of this guild.');
        }

        return $next($request);
    }
}
