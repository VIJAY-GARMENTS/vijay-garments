<?php

use Aaran\Aaconfig\Src\Customise;

return [

    'soft_version' => '1.0.0',
    'db_version' => '1.0.0',

    'app_type' => env('APP_TYPE', 'garment'),


    'features' => [
        Customise::todoList(),
    ],
];
