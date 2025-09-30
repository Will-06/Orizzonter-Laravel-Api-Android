<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteRating extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'user_id',
        'travel_route_id',
        'rating',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['user', 'travelRoute'];
    protected array $allowFilter = ['id', 'user_id', 'travel_route_id', 'rating'];
    protected array $allowSort = ['id', 'rating', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travelRoute()
    {
        return $this->belongsTo(TravelRoute::class);
    }
}
