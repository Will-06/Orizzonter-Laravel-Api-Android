<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Configuration>
 */
class ConfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'app_name' => 'Orizzonte',
            'default_language' => 'es',
            'terms_of_service_content' => fake()->paragraphs(3, true),
            'terms_of_service_version' => '1.0.0',
            'contact_email' => 'contact@orizzonte.com',
            'app_phone_number' => '+57 300 000 0000',
            'maintenance_mode' => false,
        ];
    }
}
