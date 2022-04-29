<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->text(50),
            'slug'        => $this->faker->unique()->slug(),
            'description' => $this->faker->text(200),
        ];
    }
}
