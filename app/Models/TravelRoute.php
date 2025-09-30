<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelRoute extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'distance',
        'elevation_gain',
        'difficulty',
        'privacy',
        'geojson_data',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['user', 'ratings', 'comments', 'savedByUsers'];
    protected array $allowFilter = ['id', 'user_id', 'difficulty', 'privacy'];
    protected array $allowSort = ['id', 'distance', 'elevation_gain', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(RouteRating::class);
    }

    public function comments()
    {
        return $this->hasMany(RouteComment::class);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_travel_routes');
    }
}
