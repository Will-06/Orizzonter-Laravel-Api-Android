<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'type',
        'name',
        'creator_id',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['creator', 'participants', 'messages'];
    protected array $allowFilter = ['id', 'type', 'name', 'creator_id'];
    protected array $allowSort = ['id', 'name', 'created_at'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'chat_participants')
            ->withPivot('is_admin', 'last_read_message_id')
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
