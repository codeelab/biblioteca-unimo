<?php

namespace App\Http\Middleware;

use Closure;

class Authenticated
{
    public function handle($request, Closure $next)
    {
        if(auth()->user()->type == 1){
            return $next($request);
        } else if(auth()->user()->type == 0){
            return $next($request);
        }

        return redirect('home')->with('error', "You have no proper authentication to access the area!");

    }
}