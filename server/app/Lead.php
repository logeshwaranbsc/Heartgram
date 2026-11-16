<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'source',
        'name',
        'email',
        'whatsapp_number',
        'occasion',
        'occasion_date',
        'story_or_message',
        'status',
    ];
}
