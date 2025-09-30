<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'name',
        'display_name',
    ];

    // white lists
    protected array $allowIncluded = ['users'];
    protected array $allowFilter = ['id', 'name', 'display_name'];
    protected array $allowSort = ['id', 'name', 'display_name'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
