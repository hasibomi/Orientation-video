<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                abort(404);
            }
        }

        if(\Auth::user() && \Auth::user()->type != 'admin')
        {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                abort(404);
            }
        }

        return $next($request);
    }
}
