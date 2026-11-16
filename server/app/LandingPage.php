<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $fillable = ['name', 'slug', 'content', 'is_published', 'seo_tags'];

    protected $casts = [
        'content' => 'array',
        'is_published' => 'boolean',
    ];
}
