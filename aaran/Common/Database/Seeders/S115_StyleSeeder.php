<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Style;
use Illuminate\Database\Seeder;

class S115_StyleSeeder extends Seeder
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
