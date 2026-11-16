<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    protected $fillable = ['name', 'slug', 'is_published', 'content', 'seo_tags'];

    protected $casts = [
        'is_published' => 'boolean',
        'content' => 'array',
    ];
}
