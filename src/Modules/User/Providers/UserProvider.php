<?php

namespace Grundmanis\Laracms\Modules\User\Providers;

use Grundmanis\Laracms\Modules\User\Middleware\LaracmsRedirectIfAuthenticated;
use Grundmanis\Laracms\Modules\User\Middleware\LaracmsRedirectIfNotAuthenticated;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Grundmanis\Laracms\Modules\Dashboard\Facades\MenuFacade;

class UserProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'laracms.user');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_user_routes.php');
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
        $this->addMenuRoutes();
    }

    /**
     *
     */
    private function addMenuRoutes()
    {
        $menu = [
            'admin.menu.users' => 'laracms.users'
        ];

        MenuFacade::addMenu($menu);
    }

}
