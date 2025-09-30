<?php

namespace Database\Seeders;

use App\Models\RouteComment;
use App\Models\TravelRoute;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $travelRoutes = TravelRoute::all();
        $users = User::all();
        foreach ($travelRoutes as $route) {
            // Crear 5 comentarios principales por ruta
            $mainComments = RouteComment::factory()->count(5)->create([
                'travel_route_id' => $route->id,
                'user_id' => $users->random()->id,
                'parent_comment_id' => null,
            ]);
            // Crear 2-3 respuestas para cada comentario principal
            foreach ($mainComments as $comment) {
                RouteComment::factory()->count(fake()->numberBetween(1, 3))->create([
                    'travel_route_id' => $route->id,
                    'user_id' => $users->random()->id,
                    'parent_comment_id' => $comment->id,
                ]);
            }
        }
    }
}
