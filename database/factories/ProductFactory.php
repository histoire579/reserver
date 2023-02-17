<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'title_en' => $this->faker->sentence(),
            'description' => $this->faker->sentence(rand(1,3), true),
            'description_en' => $this->faker->sentence(rand(1,3), true),
            'image' => $this->faker->imageUrl(),
            'image2' => $this->faker->imageUrl(),
            'image3' => $this->faker->imageUrl(),
            'prix' => rand(10000, 15000),
            'stock' => rand(10, 20),
            'actif' => $this->faker->boolean(80),
            'title' => $this->faker->sentence(),
            'cat_id' => rand(1, 10),
        ];
    }
}
