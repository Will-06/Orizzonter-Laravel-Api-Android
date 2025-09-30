<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personalization>
 */
class PersonalizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => Profile::factory(),
            'theme' => fake()->randomElement(['light', 'dark', 'blue']),
            'language' => fake()->randomElement(['es', 'en', 'fr']),
            'ui_preferences' => json_encode(['notifications' => true, 'dark_mode' => false]),
        ];
    }
}
