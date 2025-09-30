<?php

namespace Database\Factories;

use App\Models\RouteComment;
use App\Models\TravelRoute;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RouteComment>
 */
class RouteCommentFactory extends Factory
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
            'content' => fake()->sentence(),
            'parent_comment_id' => null,
        ];
    }
    public function reply(RouteComment $parent)
    {
        return $this->state(function (array $attributes) use ($parent) {
            return [
                'parent_comment_id' => $parent->id,
                'user_id' => User::factory(), // Asegura que el reply es de un user distinto
                'travel_route_id' => $parent->travel_route_id, // Mismo route que el padre
            ];
        });
    }
}
