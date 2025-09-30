<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalization extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'profile_id',
        'theme',
        'language',
        'ui_preferences',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['profile'];
    protected array $allowFilter = ['id', 'profile_id', 'theme', 'language'];
    protected array $allowSort = ['id', 'created_at'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
