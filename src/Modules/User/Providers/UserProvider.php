<?php

namespace Grundmanis\Laracms\Modules\User\Providers;

use Grundmanis\Laracms\Modules\User\Middleware\LaracmsRedirectIfAuthenticated;
use Grundmanis\Laracms\Modules\User\Middleware\LaracmsRedirectIfNotAuthenticated;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        // User module
        $router->aliasMiddleware('laracms.auth', LaracmsRedirectIfNotAuthenticated::class);
        $router->aliasMiddleware('laracms.guest', LaracmsRedirectIfAuthenticated::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
