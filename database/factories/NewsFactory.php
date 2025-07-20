<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->paragraphs(3, true),
            'date_created' => $this->faker->date(),
            'thumbnail' => $this->faker->imageUrl(640, 480, 'news', true, 'Faker'),
            'type' => $this->faker->randomElement(['NEWS', 'DONATION']),
            'is_active' => $this->faker->boolean(80), // 80% chance true
        ];
    }
}
