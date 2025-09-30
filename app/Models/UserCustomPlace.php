<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCustomPlace extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'type',
        'latitude',
        'longitude',
        'address',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['user'];
    protected array $allowFilter = ['id', 'user_id', 'type'];
    protected array $allowSort = ['id', 'name', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
