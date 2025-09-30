<?php

namespace Database\Seeders;

use App\Models\TravelRoute;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravelRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id');
        for ($i = 0; $i < 50; $i++) {
            TravelRoute::factory()->create([
                'user_id' => fake()->randomElement($userIds),
            ]);
        }
    }
}
