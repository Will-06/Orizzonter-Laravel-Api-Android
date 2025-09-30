<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'user_id',
        'total_distance',
        'total_rides',
        'average_speed',
        'longest_ride',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['user'];
    protected array $allowFilter = ['id', 'user_id'];
    protected array $allowSort = ['id', 'total_distance', 'total_rides', 'average_speed', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
