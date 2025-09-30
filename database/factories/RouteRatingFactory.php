<?php

namespace Database\Factories;

use App\Models\TravelRoute;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RouteRating>
 */
class RouteRatingFactory extends Factory
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
            'travel_route_id' => TravelRoute::factory(),
            'rating' => fake()->numberBetween(1, 5),
        ];
    }
}
