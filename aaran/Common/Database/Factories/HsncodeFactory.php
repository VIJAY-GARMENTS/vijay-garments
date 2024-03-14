<?php

namespace Aaran\Common\Database\Factories;

use Aaran\Common\Models\Hsncode;
use Illuminate\Database\Eloquent\Factories\Factory;

class HsncodeFactory extends Factory
{
    protected $model = Hsncode::class;
    public function definition(): array
    {
        return [
            'vname' => 'Hsncode',
            'active_id' => 1
        ];
    }
}
