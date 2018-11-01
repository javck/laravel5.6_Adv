<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Auth;

class GlobalMiddleTest
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
        Log::debug('middleTest preFilter...');

        $response = $next($request);
        Log::debug('middleTest postFilter...');
        return $response;
    }
}
