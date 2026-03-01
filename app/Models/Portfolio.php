<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'image',
        'features',
        'pricing',
        'published',
        'order',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
