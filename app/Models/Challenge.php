<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'name',
        'description',
        'type',
        'goal',
        'start_date',
        'end_date',
        'reward_id',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['reward', 'users'];
    protected array $allowFilter = ['id', 'name', 'type', 'reward_id'];
    protected array $allowSort = ['id', 'name', 'start_date', 'end_date', 'goal', 'created_at'];

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_challenges')
            ->withPivot('status', 'progress', 'completed_at')
            ->withTimestamps();
    }
}
