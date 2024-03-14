<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Ledger;
use Illuminate\Database\Seeder;

class LedgerSeeder extends Seeder
{
    public static function run(): void
    {
        Ledger::create([
            'vname' => 'Tiruppur',
            'active_id' => '1'
        ]);
    }
}
