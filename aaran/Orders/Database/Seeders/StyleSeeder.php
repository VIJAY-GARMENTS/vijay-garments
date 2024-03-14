<?php

namespace Aaran\Orders\Database\Seeders;

use Aaran\Orders\Models\Style;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    public static function run(): void
    {
        Style::create([
            'vname' => 'Style - 1',
            'desc' => 'Style - 1 desc',
            'active_id' => '1',
        ]);

        Style::create([
            'vname' => 'Style - 2',
            'desc' => 'Style - 2 desc',
            'active_id' => '1',
        ]);

        Style::create([
            'vname' => 'Style - 3',
            'desc' => 'Style - 3 desc',
            'active_id' => '1',
        ]);
    }
}
