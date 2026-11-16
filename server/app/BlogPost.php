<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'is_published',
        'seo_tags',
    ];
    
    protected $casts = [
        'is_published' => 'boolean',
    ];
}
