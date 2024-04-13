<?php

namespace Database\Seeders;

use App\Models\DefaultCompany;
use Illuminate\Database\Seeder;

class S01_TenantSeeder extends Seeder
{
    public static function run(): void
    {
        DefaultCompany::create([
            't_name' => 'codexsun',
            'active_id' => '1'
        ]);
    }
}
