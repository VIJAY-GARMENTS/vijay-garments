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

            'vname' => '-',
            'order_name' => '-',
            'company_id' => '1',
            'active_id' => '1'
        ]);

    }
}
