<?php

namespace Aaran\Common\Database\Factories;

use Aaran\Common\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransportFactory extends Factory
{
    protected $model = Transport::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'vehicle_no' => 'TN39DC5455',
            'active_id' => 1
        ];
    }
}
