<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SeoPage;

class SeoPageController extends Controller
{
    public function show(Request $request, $slug)
    {
        $query = SeoPage::where('slug', $slug);
        
        // Allow previewing drafts with a query string (usually from admin panel)
        if (!$request->has('preview')) {
            $query->where('is_published', true);
        }
        
        $page = $query->firstOrFail();
        
        $content = $page->content ?? [];
        
        return view('pages.seo-page', compact('page', 'content'));
    }
}
