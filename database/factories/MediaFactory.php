<?php

namespace Database\Factories;

use App\Models\TravelRoute;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => 'media/' . fake()->uuid() . '.jpg',
            'filename' => fake()->word() . '.jpg',
            'mime_type' => 'image/jpeg',
            'type' => fake()->randomElement(['image', 'video']),
            'size' => fake()->numberBetween(1000, 500000),
            'alt_text' => fake()->sentence(),
            'uploaded_by_user_id' => User::factory(),
            // --- ¡AÑADIDO AQUÍ! ---
            // Asegura que la media se asocie a una ruta de viaje existente
            'attachable_id' => TravelRoute::factory(),
            'attachable_type' => TravelRoute::class,
            // --------------------
        ];
    }
}
