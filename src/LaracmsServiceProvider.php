<?php

namespace Grundmanis\Laracms;

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
        require(__DIR__.'/functions.php');

        $this->publishes([
            __DIR__.'/assets/' => public_path('laracms_assets/'),
        ], 'laracms');

        $this->registerModules();
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
     * Load view, migration, routes
     */
    private function registerModules()
    {
        $modulesFolder = __DIR__ . '/Modules/';
        $modules = scandir($modulesFolder);
        $moduleNames = array_diff($modules, ['.', '..']);

        foreach ($moduleNames as $moduleName) {
            $moduleFolder = $modulesFolder . $moduleName;
            $this->registerModuleProvider($moduleFolder, $moduleName);
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
            $providers = scandir($folder);
            $providerNames = array_diff($providers, ['.', '..']);

            foreach ($providerNames as $provider) {
                $provider = str_replace('.php', '', $provider);
                $this->app->register($namespace . $provider);
            }
        }
    }

}
