<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogPost;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->get();
        return view('admin.blogs.index', compact('posts'));
    }

    public function create()
    {
        $post = new BlogPost();
        return view('admin.blogs.form', compact('post'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts',
            'image' => 'nullable|image|max:5120', // 5MB Max
            'content' => 'nullable|string',
        ]);

        $post = new BlogPost();
        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['slug']);
        $post->content = $validated['content'] ?? '';
        $post->is_published = $request->has('is_published');
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $post->image = $path;
        }
        
        $post->seo_tags = $request->input('seo_tags');
        $post->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Post created successfully.');
    }

    public function edit(BlogPost $blog)
    {
        $post = $blog;
        return view('admin.blogs.form', compact('post'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts,slug,' . $blog->id,
            'image' => 'nullable|image|max:5120',
            'content' => 'nullable|string',
        ]);

        $blog->title = $validated['title'];
        $blog->slug = Str::slug($validated['slug']);
        $blog->content = $validated['content'] ?? '';
        $blog->is_published = $request->has('is_published');

        if ($request->hasFile('image')) {
            // Optionally delete the old image here
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $path = $request->file('image')->store('blogs', 'public');
            $blog->image = $path;
        } elseif ($request->has('remove_image') && $request->remove_image == '1') {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->image = null;
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Post updated successfully.');
    }

    public function destroy(BlogPost $blog)
    {
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog Post deleted successfully.');
    }
}
