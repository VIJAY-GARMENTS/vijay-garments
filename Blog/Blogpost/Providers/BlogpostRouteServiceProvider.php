<?php

namespace Blog\Blogpost\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class BlogpostRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(__DIR__.'/../routes.php');
        });
    }

}
