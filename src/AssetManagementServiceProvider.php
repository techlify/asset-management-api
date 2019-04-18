<?php

namespace Techlify\AssetManagement;

use Illuminate\Support\ServiceProvider;

/**
 * Description of AssetManagementServiceProvider
 *
 * @author 
 */
class AssetManagementServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AssetManagement::class, function ()
        {
            return new AssetManagement();
        });

        $this->app->alias(AssetManagement::class, 'asset-management');
    }

}
