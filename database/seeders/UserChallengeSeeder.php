<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\User;
use App\Models\UserChallenge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id');
        $challengeIds = Challenge::pluck('id');
        foreach ($userIds as $userId) {
            foreach ($challengeIds as $challengeId) {
                if (fake()->boolean(30)) { // 30% de los usuarios participan en el desafío
                    UserChallenge::factory()->create([
                        'user_id' => $userId,
                        'challenge_id' => $challengeId,
                    ]);
                }
            }
        }
    }
}
