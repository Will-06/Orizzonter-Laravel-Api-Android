<?php

namespace Database\Seeders;

use App\Models\Statistic;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            Statistic::factory()->create(['user_id' => $user->id]);
        });
    }
}
