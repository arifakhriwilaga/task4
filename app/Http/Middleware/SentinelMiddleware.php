<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;


// use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Http\Middleware\SentinelMiddleware as BaseVerifier;
class SentinelMiddleware
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

        // if (!Sentinel::check()) {
        //     return redirect()->route('user/logged_in')->with('error', 'You are a customer and cannot access to backend section');
        // }
        // return $next($request);
    }
}
