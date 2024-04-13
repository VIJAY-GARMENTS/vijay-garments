<?php

use Aaran\Aaconfig\Src\Customise;
use Aaran\Aaconfig\Src\SaleEntry;

return [

    'company_code'=>'2',

    'features' => [
        Customise::todoList()
    ],

    'customise' => [
        SaleEntry::order(),

        SaleEntry::deliveryAddress(),

    ],
];
