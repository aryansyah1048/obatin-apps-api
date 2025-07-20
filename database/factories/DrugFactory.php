<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drug>
 */
class DrugFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(1000, 100000),            'thumbnail' => $this->faker->imageUrl(640, 480, 'medicine', true, 'drug'),
            'description' => $this->faker->sentence(10),
            'stock' => $this->faker->numberBetween(0, 100),
            'is_active' => $this->faker->boolean(90), // 90% kemungkinan true
        ];
    }
}
