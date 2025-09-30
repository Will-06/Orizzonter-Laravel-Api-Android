<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'name',
        'description',
        'reward_type',
        'value',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['challenges'];
    protected array $allowFilter = ['id', 'name', 'reward_type'];
    protected array $allowSort = ['id', 'name', 'created_at'];

    public function challenges()
    {
        return $this->hasMany(Challenge::class);
    }
}
