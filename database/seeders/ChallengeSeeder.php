<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\Reward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rewardIds = Reward::pluck('id');
        for ($i = 0; $i < 20; $i++) {
            Challenge::factory()->create([
                'reward_id' => fake()->randomElement($rewardIds),
            ]);
        }
    }
}
