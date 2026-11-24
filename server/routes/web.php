<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/occasions', function () {
    return view('pages.occasions');
})->name('occasions');

Route::get('/our-occasions', function () {
    return redirect()->route('occasions');
});

Route::get('/create-your-heartgram-song', function () {
    return view('pages.create-song');
})->name('create-song');

Route::get('/create-song', function () {
    return redirect()->to('/create-your-heartgram-song');
});

Route::get('/privacy-policy', function () {
    return view('pages.privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/refund-policy', function () {
    return view('pages.refund');
})->name('refund');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/testimonials', function () {
    return view('pages.testimonials');
})->name('testimonials');

Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');

Route::get('/why-heartgrams', [\App\Http\Controllers\WhyHeartgramController::class, 'index'])->name('why-heartgrams');
Route::post('/leads', [\App\Http\Controllers\LeadController::class, 'store'])->name('leads.store');

// Admin Auth Routes
Route::get('admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);
Route::post('admin/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

// Secure Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/leads', [\App\Http\Controllers\AdminController::class, 'leads'])->name('admin.leads');
    Route::get('/admin/leads/{id}', [\App\Http\Controllers\AdminController::class, 'showLead'])->name('admin.leads.show');
    Route::delete('/admin/leads/{id}', [\App\Http\Controllers\AdminController::class, 'destroyLead'])->name('admin.leads.destroy');
    Route::get('/admin/plans', [\App\Http\Controllers\Admin\PlanController::class, 'index'])->name('admin.plans.index');
    Route::post('/admin/plans', [\App\Http\Controllers\Admin\PlanController::class, 'update'])->name('admin.plans.update');
    Route::get('/admin/pages/why-heartgrams', [\App\Http\Controllers\AdminController::class, 'editWhyHeartgrams'])->name('admin.pages.why-heartgrams');
    Route::post('/admin/pages/why-heartgrams', [\App\Http\Controllers\AdminController::class, 'updateWhyHeartgrams'])->name('admin.pages.why-heartgrams.update');

    Route::resource('admin/landing-pages', \App\Http\Controllers\Admin\LandingPageController::class)->except(['show'])->names([
        'index' => 'admin.landing-pages.index',
        'create' => 'admin.landing-pages.create',
        'store' => 'admin.landing-pages.store',
        'edit' => 'admin.landing-pages.edit',
        'update' => 'admin.landing-pages.update',
        'destroy' => 'admin.landing-pages.destroy',
    ]);

    Route::resource('admin/seo-pages', \App\Http\Controllers\Admin\SeoPageController::class)->except(['show'])->names([
        'index' => 'admin.seo-pages.index',
        'create' => 'admin.seo-pages.create',
        'store' => 'admin.seo-pages.store',
        'edit' => 'admin.seo-pages.edit',
        'update' => 'admin.seo-pages.update',
        'destroy' => 'admin.seo-pages.destroy',
    ]);

    Route::resource('admin/blogs', \App\Http\Controllers\Admin\BlogController::class)->except(['show'])->names([
        'index' => 'admin.blogs.index',
        'create' => 'admin.blogs.create',
        'store' => 'admin.blogs.store',
        'edit' => 'admin.blogs.edit',
        'update' => 'admin.blogs.update',
        'destroy' => 'admin.blogs.destroy',
    ]);

    Route::resource('admin/testimonials', \App\Http\Controllers\Admin\TestimonialController::class)->except(['show'])->names([
        'index' => 'admin.testimonials.index',
        'create' => 'admin.testimonials.create',
        'store' => 'admin.testimonials.store',
        'edit' => 'admin.testimonials.edit',
        'update' => 'admin.testimonials.update',
        'destroy' => 'admin.testimonials.destroy',
    ]);

    // Occasion Showcase Songs (Cloudinary Audio)
    Route::post('admin/occasion-songs/seed', [\App\Http\Controllers\Admin\OccasionSongController::class, 'seedDefaults'])->name('admin.occasion-songs.seed');
    Route::post('admin/occasion-songs/{id}/quick-audio', [\App\Http\Controllers\Admin\OccasionSongController::class, 'quickAudioUpdate'])->name('admin.occasion-songs.quick-audio');
    Route::resource('admin/occasion-songs', \App\Http\Controllers\Admin\OccasionSongController::class)->except(['show'])->names([
        'index' => 'admin.occasion-songs.index',
        'create' => 'admin.occasion-songs.create',
        'store' => 'admin.occasion-songs.store',
        'edit' => 'admin.occasion-songs.edit',
        'update' => 'admin.occasion-songs.update',
        'destroy' => 'admin.occasion-songs.destroy',
    ]);
});

// Public landing page route
Route::get('/l/{slug}', [\App\Http\Controllers\LandingPageController::class, 'show'])->name('landing.show');

// Public SEO page route
Route::get('/{slug}', [\App\Http\Controllers\SeoPageController::class, 'show'])->name('seo.show');

// Public Blog post route
Route::get('/blog/{slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
