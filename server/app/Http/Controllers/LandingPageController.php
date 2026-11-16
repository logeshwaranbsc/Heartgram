<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPage;

class LandingPageController extends Controller
{
    public function show(Request $request, $slug)
    {
        $query = LandingPage::where('slug', $slug);
        
        // Allow previewing drafts with a query string (usually from admin panel)
        if (!$request->has('preview')) {
            $query->where('is_published', true);
        }
        
        $page = $query->firstOrFail();
        
        $content = $page->content ?? [];
        
        return view('pages.landing-page', compact('page', 'content'));
    }
}
