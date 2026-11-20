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

    public function getTitleAttribute($value)
    {
        if (str_contains($value, 'The Perfect Proposal') || str_contains($value, 'Pop the Question')) {
            return 'How to Propose with a Personalised Song';
        }
        return $value;
    }

    public function getContentAttribute($value)
    {
        if (str_contains($value, 'Why Music Makes the Moment') || str_contains($value, 'studio-quality tracks') || str_contains($value, 'Sarah T')) {
            // #69: Make Why Music Makes the Moment an H2
            $value = preg_replace('/<h1[^>]*>Why Music Makes the Moment<\/h1>/i', '<h2>Why Music Makes the Moment</h2>', $value);
            // #71: Gender-neutral wording
            $value = str_replace('It makes her feel truly seen and heard.', 'It makes them feel truly seen and heard.', $value);
            // #72: Remove quote block with unconsented placeholder quote
            $value = preg_replace('/<blockquote[\s\S]*?<\/blockquote>/i', '', $value);
            // #73: Truth in advertising under How Heartgrams Can Help
            $value = preg_replace(
                '/At Heartgrams, we specialize in taking your raw memories and turning them into professional, studio-quality tracks\. It\'s as simple as filling out a form and letting our artists do the rest!/i',
                'Tell us how you met and what you want to say. A lyricist who writes in your language turns your answers into lyrics, our team checks them, and once you approve, we make your song.',
                $value
            );
        }
        return $value;
    }
}
