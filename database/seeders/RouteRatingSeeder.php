<?php

namespace Database\Seeders;

use App\Models\RouteRating;
use App\Models\TravelRoute;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los IDs de usuarios y rutas de viaje
        $userIds = User::pluck('id');
        $travelRouteIds = TravelRoute::pluck('id');

        $ratingsToCreate = [];

        // Asegurarse de que existan usuarios y rutas antes de continuar
        if ($userIds->isEmpty() || $travelRouteIds->isEmpty()) {
            return;
        }

        // Crear calificaciones para un subconjunto de rutas de viaje
        $travelRouteIds->each(function ($routeId) use ($userIds, &$ratingsToCreate) {
            // Un número aleatorio de usuarios (entre 1 y 5) califica esta ruta
            $usersToRate = $userIds->random(min(fake()->numberBetween(1, 5), $userIds->count()));

            foreach ($usersToRate as $userId) {
                // Generar una calificación aleatoria
                $rating = fake()->numberBetween(1, 5);

                $ratingsToCreate[] = [
                    'user_id' => $userId,
                    'travel_route_id' => $routeId,
                    'rating' => $rating,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        });

        // Insertar todas las calificaciones de manera masiva para evitar duplicados
        RouteRating::insert($ratingsToCreate);
    }
}
