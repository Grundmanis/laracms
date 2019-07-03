<?php

namespace Grundmanis\Laracms\Modules\Dashboard\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LaracmsLanguage
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
        if ($request->lng) {
            Session::put('locale', $request->lng);
        }

        if (!Session::get('locale')) {
            Session::put('locale', App::getLocale());
        }

        App::setLocale(Session::get('locale'));

        return $next($request);
    }
}