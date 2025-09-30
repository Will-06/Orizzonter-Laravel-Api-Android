<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $moderatorRole = \App\Models\Role::where('name', 'moderator')->first();
        if (!$moderatorRole) {
            $moderatorRole = \App\Models\Role::factory()->create(['name' => 'moderator']);
        }
        $moderators = User::where('role_id', $moderatorRole->id)->get();
        if ($moderators->isEmpty()) {
            $moderators = User::factory()->count(3)->create(['role_id' => $moderatorRole->id]);
        }
        for ($i = 0; $i < 10; $i++) {
            Announcement::factory()->create([
                'moderator_id' => fake()->randomElement($moderators->pluck('id')),
            ]);
        }
    }
}
