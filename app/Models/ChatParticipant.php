<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatParticipant extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'chat_id',
        'user_id',
        'is_admin',
        'last_read_message_id',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['chat', 'user', 'lastReadMessage'];
    protected array $allowFilter = ['id', 'chat_id', 'user_id', 'is_admin'];
    protected array $allowSort = ['id', 'created_at'];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lastReadMessage()
    {
        return $this->belongsTo(Message::class, 'last_read_message_id');
    }
}
