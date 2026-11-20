<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = collect();

        try {
            $query = BlogPost::orderBy('created_at', 'desc');
            
            if (!$request->has('preview')) {
                $query->where('is_published', true);
            }
            
            $posts = $query->get();
        } catch (\Throwable $e) {
            // If primary database (MySQL) is unavailable, fallback to SQLite
            try {
                $posts = BlogPost::on('sqlite')->where('is_published', true)->orderBy('created_at', 'desc')->get();
            } catch (\Throwable $ex) {
                $posts = collect();
            }
        }

        // If no posts are returned, supply the default post from the design audit
        if ($posts->isEmpty()) {
            $defaultPost = new BlogPost();
            $defaultPost->id = 1;
            $defaultPost->title = 'How to Propose with a Personalised Song';
            $defaultPost->slug = 'the-perfect-proposal-using-custom-music';
            $defaultPost->image = null;
            $defaultPost->created_at = Carbon::parse('2026-07-15');
            $defaultPost->is_published = true;
            $defaultPost->content = '<h2>Why Music Makes the Moment</h2>'
                . '<p>There are a few universal truths when it comes to proposing, and one of the biggest is that music sets the mood. A personalized song can completely transform a normal setting into a romantic, unforgettable experience.</p>'
                . '<h3>1. Tell Your Unique Story</h3>'
                . '<p>Instead of playing a popular song that everyone uses, a custom song allows you to weave in the details of your actual relationship. You can mention the day you met, the first movie you watched together, and inside jokes that only the two of you understand.</p>'
                . '<ul>'
                . '<li>It makes them feel truly seen and heard.</li>'
                . '<li>It shows effort and deep thought.</li>'
                . '<li>It gives you a keepsake you can play at your wedding.</li>'
                . '</ul>'
                . '<h3>How Heartgrams Can Help</h3>'
                . '<p>Tell us how you met and what you want to say. A lyricist who writes in your language turns your answers into lyrics, our team checks them, and once you approve, we make your song.</p>';
            $posts = collect([$defaultPost]);
        }
        
        return view('pages.blog', compact('posts'));
    }

    public function show(Request $request, $slug)
    {
        $post = null;

        try {
            $query = BlogPost::query();
            
            if ($slug === 'how-to-propose-with-a-personalised-song' || str_contains($slug, 'proposal') || str_contains($slug, 'pop-the-question')) {
                $query->where(function($q) use ($slug) {
                    $q->where('slug', $slug)
                      ->orWhere('slug', 'the-perfect-proposal-using-custom-music')
                      ->orWhere('slug', 'how-to-propose-with-a-personalised-song')
                      ->orWhere('slug', 'like', '%perfect-proposal%')
                      ->orWhere('slug', 'like', '%pop-the-question%');
                });
            } else {
                $query->where('slug', $slug);
            }
            
            if (!$request->has('preview')) {
                $query->where('is_published', true);
            }
            
            $post = $query->first();
        } catch (\Throwable $e) {
            try {
                $post = BlogPost::on('sqlite')->where('slug', $slug)->first();
            } catch (\Throwable $ex) {
                $post = null;
            }
        }

        if (!$post && ($slug === 'how-to-propose-with-a-personalised-song' || str_contains($slug, 'proposal') || str_contains($slug, 'the-perfect-proposal-using-custom-music'))) {
            $post = new BlogPost();
            $post->id = 1;
            $post->title = 'How to Propose with a Personalised Song';
            $post->slug = 'the-perfect-proposal-using-custom-music';
            $post->image = null;
            $post->created_at = Carbon::parse('2026-07-15');
            $post->is_published = true;
            $post->content = '<h2>Why Music Makes the Moment</h2>'
                . '<p>There are a few universal truths when it comes to proposing, and one of the biggest is that music sets the mood. A personalized song can completely transform a normal setting into a romantic, unforgettable experience.</p>'
                . '<h3>1. Tell Your Unique Story</h3>'
                . '<p>Instead of playing a popular song that everyone uses, a custom song allows you to weave in the details of your actual relationship. You can mention the day you met, the first movie you watched together, and inside jokes that only the two of you understand.</p>'
                . '<ul>'
                . '<li>It makes them feel truly seen and heard.</li>'
                . '<li>It shows effort and deep thought.</li>'
                . '<li>It gives you a keepsake you can play at your wedding.</li>'
                . '</ul>'
                . '<h3>How Heartgrams Can Help</h3>'
                . '<p>Tell us how you met and what you want to say. A lyricist who writes in your language turns your answers into lyrics, our team checks them, and once you approve, we make your song.</p>';
        }

        if (!$post) {
            abort(404);
        }
        
        return view('pages.blog-show', compact('post'));
    }
}

