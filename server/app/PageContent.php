<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = ['key', 'value'];
    
    /**
     * Helper to get a value by key.
     */
    public static function get($key, $default = null)
    {
        // Temporarily bypass the database to prevent hanging while MySQL is down.
        return $default;
    }
}
