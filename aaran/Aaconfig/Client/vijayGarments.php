<?php

use Aaran\Aaconfig\Src\Customise;
use Aaran\Aaconfig\Src\SaleEntry;

return [

    'company_code'=>'300',

    'features' => [
        Customise::todoList()
    ],

    'customise' => [
        SaleEntry::order(),
        SaleEntry::billingAddress(),
        SaleEntry::deliveryAddress(),
        SaleEntry::despatch(),
        SaleEntry::style(),

    ],
];
