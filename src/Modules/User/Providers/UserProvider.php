<?php

namespace Grundweb\Laracms\Modules\User\Providers;

use Grundweb\Laracms\Modules\User\Middleware\LaracmsRedirectIfAuthenticated;
use Grundweb\Laracms\Modules\User\Middleware\LaracmsRedirectIfNotAuthenticated;
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
