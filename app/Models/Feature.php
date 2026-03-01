<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'icon_file',
        'order',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public static function getPublished()
    {
        return static::where('published', true)
            ->orderBy('order')
            ->get();
    }
}
