<?php

namespace App\Models;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory, Queryable;

    protected $fillable = [
        'path',
        'filename',
        'mime_type',
        'type',
        'size',
        'alt_text',
        'uploaded_by_user_id',
        'attachable_id',
        'attachable_type',
    ];

    // Listas blancas para el trait Queryable
    protected array $allowIncluded = ['uploader'];
    protected array $allowFilter = ['id', 'type', 'uploaded_by_user_id', 'attachable_id', 'attachable_type'];
    protected array $allowSort = ['id', 'created_at', 'size'];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by_user_id');
    }

    public function attachable()
    {
        return $this->morphTo();
    }
}
