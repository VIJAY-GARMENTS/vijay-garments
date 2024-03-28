<?php

namespace Aaran\Offset\Providers;

use Illuminate\Support\ServiceProvider;

class OffsetServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','entries');

        $this->app->register(OffsetRouteServiceProvider::class);
    }

}
