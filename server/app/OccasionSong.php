<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccasionSong extends Model
{
    protected $table = 'occasion_songs';

    protected $fillable = [
        'occasion_id',
        'title',
        'uppercase',
        'subtitle',
        'category',
        'language',
        'image',
        'audio',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
