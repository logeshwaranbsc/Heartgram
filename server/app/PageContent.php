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
        try {
            $record = static::where('key', $key)->first();
            return $record !== null ? $record->value : $default;
        } catch (\Throwable $e) {
            return $default;
        }
    }
}
