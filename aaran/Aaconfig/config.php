<?php

use Aaran\Aaconfig\Src\Customise;

return [

    'app_type' => env('APP_TYPE', 'garment'),


    'features' => [
        Customise::todoList(),
    ],
];
