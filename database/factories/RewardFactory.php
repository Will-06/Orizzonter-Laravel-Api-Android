<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reward>
 */
class RewardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word() . ' Reward',
            'description' => fake()->sentence(),
            'reward_type' => fake()->randomElement(['badge', 'coupon', 'points']),
            'value' => fake()->randomNumber(2),
        ];
    }
}
