<?php

namespace Grundweb\Laracms\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LaracmsRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('laracms')->check()) {
            return redirect('/laracms');
        }
        return $next($request);
    }
}