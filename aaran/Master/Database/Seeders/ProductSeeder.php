<?php

namespace Aaran\Master\Database\Seeders;

use Aaran\Master\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public static function run(): void
    {
        Product::create([
            'vname' => 'T-Shirt',
            'product_type' => '1',
            'hsncode_id' => '1',
            'units' => '1',
            'gst_percent' => '18',
            'active_id' => '1',
            'user_id' => '1'
        ]);
    }
}
