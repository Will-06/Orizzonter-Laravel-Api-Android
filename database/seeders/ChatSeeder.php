<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id');
        for ($i = 0; $i < 10; $i++) {
            Chat::factory()->create([
                'creator_id' => fake()->randomElement($userIds),
                'type' => 'group',
            ]);
        }
        for ($i = 0; $i < 20; $i++) {
            Chat::factory()->create([
                'creator_id' => fake()->randomElement($userIds),
                'type' => 'private',
            ]);
        }
    }
}
