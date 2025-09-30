<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteComment extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'user_id',
        'travel_route_id',
        'content',
        'parent_comment_id',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['user', 'travelRoute', 'parent', 'replies'];
    protected array $allowFilter = ['id', 'user_id', 'travel_route_id', 'parent_comment_id'];
    protected array $allowSort = ['id', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travelRoute()
    {
        return $this->belongsTo(TravelRoute::class);
    }

    public function parent()
    {
        return $this->belongsTo(RouteComment::class, 'parent_comment_id');
    }

    public function replies()
    {
        return $this->hasMany(RouteComment::class, 'parent_comment_id');
    }
}
