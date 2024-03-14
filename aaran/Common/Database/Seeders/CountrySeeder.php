<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{

    public static function run(): void
    {
        Country::create([
            'vname' => 'India',
            'active_id' => '1'
        ]);
        Country::create([
            'vname' => 'Malaysia',
            'active_id' => '1'
        ]);
        Country::create([
            'vname' => 'Iceland',
            'active_id' => '1'
        ]);
        Country::create([
            'vname' => 'Japan',
            'active_id' => '1'
        ]);
        Country::create([
            'vname' => 'Korea',
            'active_id' => '1'
        ]);
    }
}
