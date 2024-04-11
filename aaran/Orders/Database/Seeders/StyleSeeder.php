<?php

namespace Aaran\Orders\Database\Seeders;

use Aaran\Orders\Models\Style;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    public static function run(): void
    {
        Style::create([
            'vname' => '-',
            'desc' => '-',
            'company_id'=>'1',
            'active_id' => '1',
        ]);

    }
}
