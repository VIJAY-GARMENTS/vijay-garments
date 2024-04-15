<?php

namespace Aaran\Master\Database\Factories;

use Aaran\Master\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrderFactory extends Factory
{
    protected $model = Order::class;
    public function definition(): array
    {
        return [
            'vname' => 'OrderFactory',
            'active_id' => '1'
        ];
    }
}
