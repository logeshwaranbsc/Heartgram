<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        try {
            $testimonials = Testimonial::orderBy('sort_order', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();
        } catch (\Throwable $e) {
            $testimonials = collect();
            session()->now('warning', 'The "testimonials" table does not exist in your MySQL database yet. Please run: php artisan migrate (or execute the CREATE TABLE query in phpMyAdmin).');
        }

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $testimonial = new Testimonial();
        $testimonial->type = 'video';
        $testimonial->rating = 5;
        $testimonial->is_published = true;
        $testimonial->sort_order = 0;

        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:video,text,image',
            'occasion' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'text' => 'nullable|string',
            'video_url' => 'nullable|string',
            'media' => 'nullable|string|max:1000',
            'media_file' => 'nullable|image|max:10240', // 10MB max if uploading file
            'audio' => 'nullable|string|max:1000',
            'audio_file' => 'nullable|file|mimes:mp3,wav,m4a,ogg|max:20480',
            'duration' => 'nullable|string|max:50',
            'tag' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'location' => 'nullable|string|max:100',
            'channel' => 'nullable|string|max:100',
            'time' => 'nullable|string|max:100',
            'keepsake' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $testimonial = new Testimonial();
        $testimonial->fill($validated);
        $testimonial->is_published = $request->has('is_published');
        $testimonial->sort_order = $request->input('sort_order', 0) ?? 0;

        // If file uploaded for media, store it; otherwise use text input (e.g. Cloudinary image URL)
        if ($request->hasFile('media_file')) {
            $path = $request->file('media_file')->store('testimonials/media', 'public');
            $testimonial->media = 'storage/' . $path;
        } elseif ($request->filled('media')) {
            $testimonial->media = trim($request->input('media'));
        }

        // If audio file uploaded
        if ($request->hasFile('audio_file')) {
            $path = $request->file('audio_file')->store('testimonials/audio', 'public');
            $testimonial->audio = 'storage/' . $path;
        } elseif ($request->filled('audio')) {
            $testimonial->audio = trim($request->input('audio'));
        }

        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:video,text,image',
            'occasion' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'text' => 'nullable|string',
            'video_url' => 'nullable|string',
            'media' => 'nullable|string|max:1000',
            'media_file' => 'nullable|image|max:10240',
            'audio' => 'nullable|string|max:1000',
            'audio_file' => 'nullable|file|mimes:mp3,wav,m4a,ogg|max:20480',
            'duration' => 'nullable|string|max:50',
            'tag' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'location' => 'nullable|string|max:100',
            'channel' => 'nullable|string|max:100',
            'time' => 'nullable|string|max:100',
            'keepsake' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $testimonial->fill($validated);
        $testimonial->is_published = $request->has('is_published');
        $testimonial->sort_order = $request->input('sort_order', 0) ?? 0;

        if ($request->hasFile('media_file')) {
            $path = $request->file('media_file')->store('testimonials/media', 'public');
            $testimonial->media = 'storage/' . $path;
        } elseif ($request->filled('media')) {
            $testimonial->media = trim($request->input('media'));
        } elseif ($request->has('remove_media') && $request->remove_media == '1') {
            $testimonial->media = null;
        }

        if ($request->hasFile('audio_file')) {
            $path = $request->file('audio_file')->store('testimonials/audio', 'public');
            $testimonial->audio = 'storage/' . $path;
        } elseif ($request->filled('audio')) {
            $testimonial->audio = trim($request->input('audio'));
        } elseif ($request->has('remove_audio') && $request->remove_audio == '1') {
            $testimonial->audio = null;
        }

        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
