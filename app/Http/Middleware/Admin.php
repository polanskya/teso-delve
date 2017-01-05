<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{

    public function handle($request, Closure $next, $guard = null)
    {

        if(!Auth::user() or Auth::user()->id !== 1) {
            return redirect()->route('home.index');
        }

        return $next($request);
    }
}
