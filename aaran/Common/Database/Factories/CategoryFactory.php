<?php

namespace Aaran\Common\Database\Factories;

use Aaran\Common\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition(): array
    {
        return [
            'vname' => 'Category',
            'active_id' => 1
        ];
    }
}
