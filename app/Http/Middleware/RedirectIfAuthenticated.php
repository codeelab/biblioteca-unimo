<?php

namespace App\Http\Middleware;

use Closure;
use App\Listeners\SessionForget;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
           if(auth()->user()->type == 1){
            return $next($request);
        } else if(auth()->user()->type == 0){
            event(new SessionForget);
                $request->session()->regenerateToken();
                $request->session()->invalidate();
            return $next($request);
        }
        }

        return $next($request);
    }
}