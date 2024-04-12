<?php

namespace Database\Seeders;

use App\Models\DefaultCompany;
use Illuminate\Database\Seeder;

class DefaultCompanySeeder extends Seeder
{
    public static function run(): void
    {
        DefaultCompany::create([
            'company_id' => '1',
            'acyear' => '1'
        ]);
    }
}
