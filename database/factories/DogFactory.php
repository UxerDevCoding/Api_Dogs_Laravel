<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name(),
            'breed' => $this->faker->word(),
            'img'   => $this->faker->imageUrl(640,480)
        ];
    }
}
