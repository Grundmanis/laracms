<?php

namespace Grundweb\Laracms;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class LaracmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootHelpers();
        $this->loadModules();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register helpers
     */
    public function bootHelpers()
    {
        // Load the helpers in app/Http/helpers.php
        if (file_exists($file = __DIR__.'/laracms_helpers.php'))
        {
            require $file;
        }
    }

    /**
     * Load view, migration, routes
     */
    private function loadModules()
    {
        foreach (array_diff(scandir(__DIR__.'/Modules/'), ['.', '..']) as $moduleName) {
            $moduleFolder = __DIR__ . '/Modules/' . $moduleName;

            $this->loadViewsFrom($moduleFolder . '/views', 'laracms.' . strtolower($moduleName));
            $this->loadMigrationsFrom($moduleFolder . '/migrations');
            $this->loadModuleRoute($moduleFolder, strtolower($moduleName));
            $this->registerModuleProvider($moduleFolder, $moduleName);
        }
    }

    /**
     *
     * Load module route if exist
     * @param $moduleFolder
     * @param $directory
     */
    private function loadModuleRoute($moduleFolder, $moduleName) {
        if (File::exists($route = $moduleFolder . '/laracms_' . $moduleName . '_routes.php'))
        {
            include $route;
        }
    }

    /**
     * @param $moduleFolder
     * @param $moduleName
     */
    private function registerModuleProvider($moduleFolder, $moduleName)
    {
        if (File::exists($folder = $moduleFolder . '/Providers'))
        {
            $namespace = __NAMESPACE__ . '\Modules\\' . $moduleName . '\\Providers\\';
            foreach (array_diff(scandir($folder), ['.', '..']) as $provider) {
                $provider = str_replace('.php', '', $provider);
                $this->app->register($namespace . $provider);
            }
        }
    }

}
