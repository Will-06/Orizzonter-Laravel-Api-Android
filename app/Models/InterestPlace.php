<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestPlace extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'name',
        'description',
        'place_type',
        'latitude',
        'longitude',
        'address',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = [];
    protected array $allowFilter = ['id', 'name', 'place_type'];
    protected array $allowSort = ['id', 'name', 'created_at'];
}
