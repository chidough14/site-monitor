<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'url'
    ];

    protected $casts = [
        'active' => 'boolean',
        'failing' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
