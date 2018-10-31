<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class RouteMiddleTest2
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
        Log::debug('RouteMiddleTest2 ...');
        return $next($request);
    }
}
