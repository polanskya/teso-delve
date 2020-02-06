<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class LastSeenMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->seen_at = Carbon::now();
            $user->save();
        }

        return $next($request);
    }
}
