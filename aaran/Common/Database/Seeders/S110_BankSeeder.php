<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Bank;
use Illuminate\Database\Seeder;

class S110_BankSeeder extends Seeder
{
    public static function run(): void
    {
        Bank::create([
            'vname' => '-',
            'active_id' => '1'
        ]);
    }
}
