<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'chat_id',
        'user_id',
        'content',
        'media_id',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['chat', 'user', 'media'];
    protected array $allowFilter = ['id', 'chat_id', 'user_id'];
    protected array $allowSort = ['id', 'created_at'];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
