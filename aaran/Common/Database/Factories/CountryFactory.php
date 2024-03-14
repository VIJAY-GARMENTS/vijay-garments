<?php

namespace Aaran\Common\Database\Factories;

use Aaran\Common\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;
    public function definition(): array
    {
        return [
            'vname' => 'Country',
            'active_id' => 1
        ];
    }
}
