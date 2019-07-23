<?php

namespace Grundmanis\Laracms\Modules\User\Middleware;

use Closure;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class LaracmsRedirectIfNotAuthenticated
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
        $prefix = config('laracms.prefix');

        if (!Auth::guard('laracms')->check()) {
            return redirect($prefix . '/login');
        }

        $user = Auth::guard('laracms')->user();

        if (!$user->updated_at && !request()->is(($prefix ? $prefix . '/' : '') . 'users/edit/' . $user->id)) {

            return redirect()
                ->route('laracms.users.edit', $user->id)
                ->with('warning', __('laracms::admin.change_default_password'));
        }

        return $next($request);
    }
}