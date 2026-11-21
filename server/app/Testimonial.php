<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    protected $fillable = [
        'type',
        'name',
        'occasion',
        'title',
        'text',
        'video_url',
        'media',
        'audio',
        'duration',
        'tag',
        'rating',
        'location',
        'channel',
        'time',
        'keepsake',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'rating' => 'integer',
        'sort_order' => 'integer',
    ];

    /**
     * Helper to get media display URL
     */
    public function getMediaUrlAttribute()
    {
        if (empty($this->media)) {
            return null;
        }

        if (str_starts_with($this->media, 'http://') || str_starts_with($this->media, 'https://')) {
            return $this->media;
        }

        return asset($this->media);
    }
}
