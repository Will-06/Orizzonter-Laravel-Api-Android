<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatParticipant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Desactivar temporalmente las comprobaciones de claves foráneas para la inserción masiva.
        // Esto es una buena práctica para evitar problemas durante la siembra de datos.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ChatParticipant::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Obtener todos los chats y usuarios existentes.
        $chats = Chat::all();
        $users = User::all();
        $messages = \App\Models\Message::all();

        // Validar que hay chats, usuarios y mensajes para trabajar
        if ($chats->isEmpty() || $users->isEmpty() || $messages->isEmpty()) {
            return;
        }

        // Crear una lista de participantes para asegurar la unicidad de las combinaciones
        $participants = [];

        // Asegurar que cada chat tiene al menos 2 participantes
        foreach ($chats as $chat) {
            // Asignar al menos 2 usuarios a cada chat
            $chatUsers = $users->random(min(2, $users->count()));
            
            foreach ($chatUsers as $index => $user) {
                $is_admin = ($index === 0); // Hacer al primer usuario un admin del chat
                $last_read_message_id = $messages->where('chat_id', $chat->id)->sortByDesc('created_at')->first()->id ?? null;

                // Usar firstOrCreate para evitar duplicados, basándose en chat_id y user_id
                ChatParticipant::firstOrCreate(
                    [
                        'chat_id' => $chat->id,
                        'user_id' => $user->id,
                    ],
                    [
                        'is_admin' => $is_admin,
                        'last_read_message_id' => $last_read_message_id,
                    ]
                );
            }
        }
    }
}
