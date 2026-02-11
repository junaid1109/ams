<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'image',
        'image_secondary',
        'client',
        'project_url',
        'project_date',
        'details',
        'published',
        'order',
    ];

    protected $casts = [
        'published' => 'boolean',
        'project_date' => 'date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
