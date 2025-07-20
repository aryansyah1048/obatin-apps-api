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
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date_created' => $this->faker->date(),
            'thumbnail' => $this->faker->imageUrl(640, 480, 'news', true, 'thumbnail'),
            'type' => $this->faker->randomElement(['NEWS', 'DONATION']),
            'is_active' => $this->faker->boolean(90),
        ];
    }
}
