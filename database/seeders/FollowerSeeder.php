<?php

namespace Database\Seeders;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            // Cada usuario sigue a 1-5 personas
            $followedUsers = $users->random(fake()->numberBetween(1, 5));
            foreach ($followedUsers as $followedUser) {
                if ($user->id !== $followedUser->id) {
                    Follower::factory()->create([
                        'follower_id' => $user->id,
                        'followed_id' => $followedUser->id,
                    ]);
                }
            }
        }
    }
}
