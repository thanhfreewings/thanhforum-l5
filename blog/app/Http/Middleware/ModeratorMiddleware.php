<?php

namespace App\Http\Middleware;

use Closure;

class ModeratorMiddleware
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
        if(\Auth::user()->getRole() != 'Moderator' && \Auth::user()->getRole() != 'Admin')
        {
            return view('errors.402');
        }
        return $next($request);
    }
}
