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
    //public function handle($request, Closure $next, $name) //單一參數
    public function handle($request, Closure $next, $type, ...$names) //多個參數
    {
        Log::debug('Args type:' . $type);
        foreach ($names as $name) {
            Log::debug('Args name:' . $name);
        }
        //Log::debug('Args name:' . $name);
        return $next($request);
    }
}
