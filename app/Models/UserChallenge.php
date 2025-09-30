<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChallenge extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'user_id',
        'challenge_id',
        'status',
        'progress',
        'completed_at',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['user', 'challenge'];
    protected array $allowFilter = ['id', 'user_id', 'challenge_id', 'status'];
    protected array $allowSort = ['id', 'progress', 'completed_at', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
