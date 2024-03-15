<?php

namespace Blog\Blogpost\Providers;

use Blog\Blogpost\Providers\BlogpostRouteServiceProvider;
use Illuminate\Support\ServiceProvider;

class BlogpostServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','blogpost');

        $this->app->register(BlogpostRouteServiceProvider::class);
    }

}
