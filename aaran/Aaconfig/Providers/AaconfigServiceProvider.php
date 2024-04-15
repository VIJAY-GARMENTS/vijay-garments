<?php

namespace Aaran\Aaconfig\Providers;

use Illuminate\Support\ServiceProvider;

class AaconfigServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php', 'aaconfig');
        $this->mergeConfigFrom(__DIR__ . '/../clients.php', 'clients');

        $this->mergeConfigFrom(__DIR__ . '/../Client/vijayGarments.php', 'vijayGarments');
        $this->mergeConfigFrom(__DIR__ . '/../Client/neethuIndustries.php', 'neethuIndustries');
        $this->mergeConfigFrom(__DIR__ . '/../Client/skPrinters.php', 'skPrinters');

        $this->app->register(AaconfigRouteServiceProvider::class);
    }

}
