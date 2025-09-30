<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'title',
        'content',
        'category',
        'moderator_id',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['moderator'];
    protected array $allowFilter = ['id', 'category', 'moderator_id'];
    protected array $allowSort = ['id', 'created_at', 'title'];

    public function moderator()
    {
        return $this->belongsTo(User::class, 'moderator_id');
    }
}
