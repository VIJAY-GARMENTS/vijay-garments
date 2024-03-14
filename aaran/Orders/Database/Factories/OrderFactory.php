<?php

namespace Aaran\Orders\Database\Factories;

use Aaran\Orders\Models\Order;
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
