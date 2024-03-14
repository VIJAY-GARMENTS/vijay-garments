<?php

namespace Aaran\Common\Database\Factories;

use Aaran\Common\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    protected $model = State::class;
    public function definition(): array
    {
        return [
            'vname' => 'State',
            'state_code' => 'code',
            'active_id' => 1
        ];
    }
}
