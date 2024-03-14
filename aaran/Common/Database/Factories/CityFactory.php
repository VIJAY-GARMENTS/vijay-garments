<?php

namespace Aaran\Common\Database\Factories;

use Aaran\Common\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    protected $model = City::class;
    public function definition(): array
    {
        return [
            'vname' => 'City',
            'active_id' => 1
        ];
    }
}
