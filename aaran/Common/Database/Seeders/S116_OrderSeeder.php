<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Order;
use Illuminate\Database\Seeder;

class S116_OrderSeeder extends Seeder
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
