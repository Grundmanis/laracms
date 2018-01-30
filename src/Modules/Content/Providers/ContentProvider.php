<?php

namespace Grundmanis\Laracms\Modules\Content\Providers;

use Grundmanis\Laracms\Modules\Content\Content;
use Grundmanis\Laracms\Modules\Content\Facades\ContentFacade;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class ContentProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'laracms.content');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_content_routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Content', Content::class);

        $loader = AliasLoader::getInstance();
        $loader->alias('Content', ContentFacade::class);
    }

}
