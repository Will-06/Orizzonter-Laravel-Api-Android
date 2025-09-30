<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'user_id',
        'nickname',
        'gender',
        'description',
        'cyclist_type',
        'completed_routes_count',
        'achievements',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['user', 'personalization'];
    protected array $allowFilter = ['id', 'user_id', 'nickname', 'cyclist_type'];
    protected array $allowSort = ['id', 'nickname', 'completed_routes_count', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function personalization()
    {
        return $this->hasOne(Personalization::class);
    }
}
