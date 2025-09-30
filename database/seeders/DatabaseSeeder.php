<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Desactivar las restricciones de clave foránea temporalmente
        // Esto es útil para los tests o el seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            PersonalizationSeeder::class,
            StatisticSeeder::class,
            ConfigurationSeeder::class,
            MediaSeeder::class, // Debe estar aquí para que los mensajes puedan usar media
            RewardSeeder::class,
            ChallengeSeeder::class,
            UserChallengeSeeder::class,
            AnnouncementSeeder::class,
            InterestPlaceSeeder::class,
            UserCustomPlaceSeeder::class,
            TravelRouteSeeder::class,
            RouteRatingSeeder::class,
            RouteCommentSeeder::class,
            SavedTravelRouteSeeder::class,
            ChatSeeder::class,
            MessageSeeder::class,
            ChatParticipantSeeder::class,
            FollowerSeeder::class,
        ]);

        // Volver a activar las restricciones de clave foránea
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
