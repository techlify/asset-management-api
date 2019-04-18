<?php

namespace TechlifyInc\TechlifyAssetManagement;

use Illuminate\Support\ServiceProvider;

/**
 * Description of TechlifyAssetManagementServiceProvider
 *
 * @author 
 */
class TechlifyAssetManagementServiceProvider extends ServiceProvider
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
        $this->app->singleton(TechlifyAssetManagement::class, function ()
        {
            return new TechlifyAssetManagement();
        });

        $this->app->alias(TechlifyAssetManagement::class, 'techlify-asset-management');
    }

}
