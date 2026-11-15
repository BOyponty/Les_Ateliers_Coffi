<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Exhibition;
use App\Models\News;
use Illuminate\Support\Facades\Route;

// ==========================================
// ROUTES PUBLIQUES
// ==========================================

Route::get('/', function () {
    return view('home', [
        'exhibitions' => Exhibition::latest()->take(4)->get(),
        'artists' => Artist::all(),
        'artworks' => Artwork::with('artist')->latest()->take(15)->get(),
    ]);
})->name('home');

Route::get('/artistes', function () {
    return view('artists', [
        'artists' => Artist::all(),
    ]);
})->name('artists');

Route::get('/artiste/{slug}', function ($slug) {
    $artist = Artist::where('slug', $slug)->firstOrFail();
    return view('artist_detail', [
        'artist' => $artist,
        'artworks' => $artist->artworks,
    ]);
})->name('artist.detail');

Route::get('/oeuvres', function () {
    return view('artworks', [
        'artworks' => Artwork::with('artist')->latest()->get(),
        'artists' => Artist::all(),
    ]);
})->name('artworks');

Route::get('/oeuvre/{slug}', function ($slug) {
    $artwork = Artwork::with('artist')->where('slug', $slug)->firstOrFail();
    return view('artwork_detail', [
        'artwork' => $artwork,
    ]);
})->name('artwork.detail');

Route::get('/expositions', function () {
    return view('expositions', [
        'exhibitions' => Exhibition::latest()->get(),
        'artworks' => Artwork::with('artist')->latest()->get(),
    ]);
})->name('expositions');

Route::get('/nouvelles', function () {
    return view('nouvelles', [
        'news' => News::latest()->get(),
    ]);
})->name('nouvelles');

Route::get('/nouvelle/{slug}', function ($slug) {
    $news = News::where('slug', $slug)->firstOrFail();
    return view('nouvelle_detail', [
        'news' => $news,
    ]);
})->name('nouvelle.detail');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// ==========================================
// ROUTES D'AUTHENTIFICATION
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// ROUTES PROTÉGÉES (ADMIN)
// ==========================================

// Redirection de /dashboard (Breeze) vers notre tableau de bord admin
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// Le vrai tableau de bord (qui pointe vers le fichier admin/dashboard.blade.php)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

// Routes de profil (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes d'authentification de Breeze (si vous les gardez)
require __DIR__.'/auth.php';
