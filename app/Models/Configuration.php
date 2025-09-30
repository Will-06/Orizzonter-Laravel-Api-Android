<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'app_name',
        'default_language',
        'terms_of_service_content',
        'terms_of_service_version',
        'contact_email',
        'app_phone_number',
        'maintenance_mode',
    ];

    protected $casts = [
        'maintenance_mode' => 'boolean',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = [];
    protected array $allowFilter = ['id', 'app_name', 'default_language', 'maintenance_mode'];
    protected array $allowSort = ['id', 'created_at'];
}
