<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserCustomPlace>
 */
class UserCustomPlaceFactory extends Factory
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
            'name' => fake()->streetName(),
            'description' => fake()->sentence(),
            'type' => fake()->randomElement(['home', 'work', 'favorite']),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'address' => fake()->address(),
        ];
    }
}
