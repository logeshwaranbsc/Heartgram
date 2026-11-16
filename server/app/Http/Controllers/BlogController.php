<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::orderBy('created_at', 'desc');
        
        if (!$request->has('preview')) {
            $query->where('is_published', true);
        }
        
        $posts = $query->get();
        
        return view('pages.blog', compact('posts'));
    }

    public function show(Request $request, $slug)
    {
        $query = BlogPost::where('slug', $slug);
        
        if (!$request->has('preview')) {
            $query->where('is_published', true);
        }
        
        $post = $query->firstOrFail();
        
        return view('pages.blog-show', compact('post'));
    }
}
