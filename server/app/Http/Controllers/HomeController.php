<?php

namespace App\Http\Controllers;

use App\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $testimonials = Testimonial::where('is_published', true)
                ->orderBy('sort_order', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();
        } catch (\Throwable $e) {
            $testimonials = collect();
        }

        return view('home', compact('testimonials'));
    }
}

