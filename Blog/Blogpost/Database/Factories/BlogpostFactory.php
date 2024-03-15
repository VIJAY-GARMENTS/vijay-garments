<?php

namespace Blog\Blogpost\Database\Factories;

use Blog\Blogpost\Model\Blogpost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Blog\Blogpost\Model\Blogpost>
 */
class BlogpostFactory extends Factory
{
    protected $model = Blogpost::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
