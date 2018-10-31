<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class ArgsMiddleTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $name)
    {
        Log::debug('Args name:' . $name);
        return $next($request);
    }
}
