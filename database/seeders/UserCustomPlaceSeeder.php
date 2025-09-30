<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserCustomPlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCustomPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id');
        foreach ($userIds as $userId) {
            UserCustomPlace::factory()->count(fake()->numberBetween(1, 3))->create([
                'user_id' => $userId,
            ]);
        }
    }
}
