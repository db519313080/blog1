<?php

namespace App\Http\Middleware;

use Closure;

class Rank
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
        dd('rank');
        return $next($request);
    }
}
