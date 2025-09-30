<?php

namespace Database\Seeders;

use App\Models\SavedTravelRoute;
use App\Models\TravelRoute;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SavedTravelRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los IDs de usuarios y rutas de viaje
        $userIds = User::pluck('id');
        $travelRouteIds = TravelRoute::pluck('id');

        // Crear un array para almacenar las combinaciones únicas de user_id y travel_route_id
        $uniquePairs = [];
        $savedRoutesToCreate = [];

        // Generar un número aleatorio de rutas guardadas por cada usuario
        foreach ($userIds as $userId) {
            $numRoutesToSave = fake()->numberBetween(1, 5);
            $shuffledRouteIds = $travelRouteIds->shuffle();

            for ($i = 0; $i < $numRoutesToSave; $i++) {
                // Asegurar que no se guarde la misma ruta dos veces para el mismo usuario
                if (isset($shuffledRouteIds[$i])) {
                    $routeId = $shuffledRouteIds[$i];
                    $pair = "$userId-$routeId";
                    if (!in_array($pair, $uniquePairs)) {
                        $uniquePairs[] = $pair;
                        $savedRoutesToCreate[] = [
                            'user_id' => $userId,
                            'travel_route_id' => $routeId,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
        }

        // Insertar todas las rutas guardadas de manera masiva
        SavedTravelRoute::insert($savedRoutesToCreate);
    }
}
