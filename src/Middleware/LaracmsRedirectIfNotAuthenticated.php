<?php

namespace Grundweb\Laracms\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRedirectIfNotAuthenticated
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
        if (!Auth::guard('laracms')->check()) {
            return redirect('/laracms/login');
        }
        return $next($request);
    }
}