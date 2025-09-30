<?php

namespace Database\Seeders;

use App\Models\Personalization;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::all()->each(function ($profile) {
            Personalization::factory()->create(['profile_id' => $profile->id]);
        });
    }
}
