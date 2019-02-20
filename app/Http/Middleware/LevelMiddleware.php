<?php

namespace App\Http\Middleware;

use Closure;

class LevelMiddleware
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
        if(\Auth::user()->level < 3){
            return $next($request);
        }
        return redirect('/d');
    }
}
