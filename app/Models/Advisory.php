<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    use HasFactory;

    protected $table = 'advisory';

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'category',
        'icon',
        'image',
        'image_secondary',
        'client',
        'project_date',
        'published',
        'order',
    ];

    protected $casts = [
        'published' => 'boolean',
        'project_date' => 'date',
    ];

    public function getRouteKeyName()
    {
        // Use ID for admin routes (they include 'admin' in the route name), slug for frontend
        $route = \Illuminate\Support\Facades\Route::currentRouteName();
        
        if ($route && str_contains($route, 'admin')) {
            return 'id';
        }
        
        return 'slug';
    }
}
