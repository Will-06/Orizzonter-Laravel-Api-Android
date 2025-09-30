<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'total_distance' => fake()->randomFloat(2, 10, 1000),
            'total_rides' => fake()->numberBetween(1, 200),
            'average_speed' => fake()->randomFloat(2, 5, 40),
            'longest_ride' => fake()->randomFloat(2, 10, 500),
        ];
    }
}
