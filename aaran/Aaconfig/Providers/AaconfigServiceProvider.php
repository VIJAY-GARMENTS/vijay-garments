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

        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/aaran_associates.php', 'aaran_associates');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/aaran_india_fashion.php', 'aaran_india_fashion');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/aaran_info_tech.php', 'aaran_info_tech');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/sk_enterprises.php', 'sk_enterprises');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/sk_printers.php', 'sk_printers');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/sri_ganapathi_printing.php', 'sri_ganapathi_printing');
        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/smsupvc.php', 'smsupvc');

        $this->mergeConfigFrom(__DIR__ . '/../Client/sundar/smsupvc.php', 'smsupvc');


        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/vijayGarments.php', 'vijayGarments');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/winmore_exports.php', 'winmore_exports');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/amal_tex.php', 'amal_tex');
        $this->mergeConfigFrom(__DIR__ . '/../Client/garments/essa_knitting.php', 'essa_knitting');


        $this->mergeConfigFrom(__DIR__ . '/../Client/suresh/neethuIndustries.php', 'neethuIndustries');


        $this->mergeConfigFrom(__DIR__ . '/../Client/uday/a1_impex.php', 'a1_impex');
        $this->mergeConfigFrom(__DIR__ . '/../Client/uday/fashion_fabrics.php', 'fashion_fabrics');
        $this->mergeConfigFrom(__DIR__ . '/../Client/uday/satyanarayana_garments.php', 'satyanarayana_garments');

        $this->app->register(AaconfigRouteServiceProvider::class);
    }

}
