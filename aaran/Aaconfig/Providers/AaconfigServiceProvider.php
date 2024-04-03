<?php

namespace Aaran\Aaconfig\Providers;

use Illuminate\Support\ServiceProvider;

class AaconfigServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','aaconfig');

        $this->app->register(AaconfigRouteServiceProvider::class);
    }

}
