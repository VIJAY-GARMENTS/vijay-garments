<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Receipttype;
use Illuminate\Database\Seeder;

class ReceipttypeSeeder extends Seeder
{
    public static function run(): void
    {
        Receipttype::create([
            'vname' => 'Tiruppur',
            'active_id' => '1'
        ]);
    }
}
