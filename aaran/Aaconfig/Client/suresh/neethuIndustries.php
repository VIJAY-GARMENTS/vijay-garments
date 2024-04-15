<?php

use Aaran\Aaconfig\Src\Customise;
use Aaran\Aaconfig\Src\SaleEntry;

return [

    'features' => [
        Customise::todoList()
    ],

    'customise' => [
        SaleEntry::order(),
        SaleEntry::billingAddress(),
        SaleEntry::transport(),

    ],
];
