<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Media;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chats = Chat::all();
        $userIds = User::pluck('id');
        $mediaIds = Media::pluck('id');

        foreach ($chats as $chat) {
            for ($i = 0; $i < 10; $i++) {
                $messageData = [
                    'chat_id' => $chat->id,
                    'user_id' => fake()->randomElement($userIds),
                    'content' => fake()->boolean(80) ? fake()->sentence() : null, // 80% de los mensajes tienen contenido de texto
                ];
                // 20% de los mensajes tienen media (imagen/video)
                if (fake()->boolean(20)) {
                    $messageData['media_id'] = fake()->randomElement($mediaIds);
                }
                Message::factory()->create($messageData);
            }
        }
    }
}
