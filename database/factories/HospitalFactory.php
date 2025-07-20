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
            'thumbnail' => "https://lh3.googleusercontent.com/gps-cs-s/AC9h4nri5Zri_mV_nol__zGOQi5SRql8fDpHrgE4ZzEntZudQg9M2458wH2BOMWGZ8tPzSDykwXQmCL65kf9hjcaj4yi-cQKZ5SDTyejRq-_wmopen8FqSCuOU2wC469l_ZRQDvg1Qce=s1360-w1360-h1020-rw",
            'phone' => fake()->phoneNumber(),

        ];
    }
}
