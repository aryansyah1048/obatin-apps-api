<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospital>
 */
class HospitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'RS - ' . fake()->name(),
            'location' => fake()->address(),
            'is_open' => true,     
            'thumbnail'=> "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaXyPXQlRzx61s_Ht84yHg_4z4v0Ysb7Lh-A&s",
            'phone' => fake()->phoneNumber(),
        ];
    }
}
