<?php

namespace Grundweb\Laracms;

use Grundweb\Laracms\Middleware\LaracmsRedirectIfAuthenticated;
use Grundweb\Laracms\Middleware\LaracmsRedirectIfNotAuthenticated;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaracmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('laracms.auth', LaracmsRedirectIfNotAuthenticated::class);
        $router->aliasMiddleware('laracms.guest', LaracmsRedirectIfAuthenticated::class);

        $this->loadViewsFrom(__DIR__.'/views', 'laracms');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/laracms_routes.php';
    }
}
