<?php

namespace Aaran\Common\Database\Factories;

use Aaran\Common\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

class DespatchFactory extends Factory
{
    protected $model = Transport::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'date' => $this->faker->date,
            'active_id' => '1'
        ];
    }
}
