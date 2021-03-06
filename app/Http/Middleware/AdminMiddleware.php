<?php

namespace App\Http\Middleware;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Closure;

class AdminMiddleware
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
        
        if ($user = !Sentinel::inRole('admin')) { 
            return redirect()->route('index')->with('error', 'You are a customer and cannot access to backend section');
        }
        return $next($request);
    }
}
