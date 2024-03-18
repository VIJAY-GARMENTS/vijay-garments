<?php

namespace Aaran\Orders\Database\Seeders;

use Aaran\Orders\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public static function run(): void
    {
        Order::create([

            'vname' => 'order-1',
            'order_name' => '1',
            'company_id' => '1',
            'active_id' => '1'
        ]);

        Order::create([

            'vname' => 'order-2',
            'order_name' => '2',
            'company_id' => '1',
            'active_id' => '1'
        ]);
    }
}
