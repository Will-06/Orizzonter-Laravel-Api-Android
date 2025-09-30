<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TravelRoute>
 */
class TravelRouteFactory extends Factory
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
            'name' => fake()->city() . ' Route',
            'description' => fake()->sentence(),
            'distance' => fake()->randomFloat(2, 5, 150),
            'elevation_gain' => fake()->randomFloat(2, 10, 2000),
            'difficulty' => fake()->randomElement(['easy', 'medium', 'hard']),
            'privacy' => fake()->randomElement(['public', 'private']),
            'geojson_data' => json_encode(['type' => 'FeatureCollection', 'features' => []]),
        ];
    }
}
