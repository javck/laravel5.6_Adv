<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Auth;

class RouteMiddleTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('RouteMiddleTest ...');
        if (Auth::user()) {
            Log::debug('user id:' . Auth::user()->id);
        }
        return $next($request);
    }
}
