<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        //return $next($request);
        //echo Auth::user()->is_admin;
        //die('123123');
        if (Auth::user()->is_admin != 1) {
            return redirect('home');
        } 
        return $next($request);
    }
}
