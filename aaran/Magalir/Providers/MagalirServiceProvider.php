<?php

namespace Aaran\Magalir\Providers;

use Illuminate\Support\ServiceProvider;

class MagalirServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','master');

        $this->app->register(MagalirRouteServiceProvider::class);
    }

}
