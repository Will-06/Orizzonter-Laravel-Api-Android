<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'follower_id',
        'followed_id',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['follower', 'followed'];
    protected array $allowFilter = ['id', 'follower_id', 'followed_id'];
    protected array $allowSort = ['id', 'created_at'];

    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    public function followed()
    {
        return $this->belongsTo(User::class, 'followed_id');
    }
}
