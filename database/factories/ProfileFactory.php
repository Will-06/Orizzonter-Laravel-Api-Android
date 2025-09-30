<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
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
            'nickname' => fake()->unique()->userName(),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'description' => fake()->sentence(),
            'cyclist_type' => fake()->randomElement(['casual', 'mountain', 'road', 'pro']),
            'completed_routes_count' => fake()->numberBetween(0, 50),
            'achievements' => json_encode(['first_ride', '100km_badge']),
        ];
    }
}
