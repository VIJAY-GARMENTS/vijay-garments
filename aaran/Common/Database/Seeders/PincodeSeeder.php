<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Pincode;
use Illuminate\Database\Seeder;

class PincodeSeeder extends Seeder
{
    public static function run(): void
    {
        Pincode::create([
            'vname' => '654654',
            'active_id' => '1'
        ]);
        Pincode::create([
            'vname' => '650021',
            'active_id' => '1'
        ]);
        Pincode::create([
            'vname' => '600012',
            'active_id' => '1'
        ]);
    }
}
