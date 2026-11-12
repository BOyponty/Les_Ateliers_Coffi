<?php

use App\Http\Controllers\ProfileController;
use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Exhibition;
use App\Models\News;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'exhibitions' => \App\Models\Exhibition::latest()->take(4)->get(),
        'artists' => \App\Models\Artist::all(),
        'artworks' => \App\Models\Artwork::with('artist')->latest()->take(15)->get(),
    ]);
})->name('home');

// Page Artistes
Route::get('/artistes', function () {
    return view('artists', [
        'artists' => Artist::all(),
    ]);
})->name('artists');

// Page détail d'un artiste
Route::get('/artiste/{slug}', function ($slug) {
    $artist = Artist::where('slug', $slug)->firstOrFail();
    return view('artist_detail', [
        'artist' => $artist,
        'artworks' => $artist->artworks,
    ]);
})->name('artist.detail');

// Page Œuvres
Route::get('/oeuvres', function () {
    return view('artworks', [
        'artworks' => Artwork::with('artist')->latest()->get(),
        'artists' => Artist::all(),
    ]);
})->name('artworks');

// Page détail d'une œuvre
Route::get('/oeuvre/{slug}', function ($slug) {
    $artwork = Artwork::with('artist')->where('slug', $slug)->firstOrFail();
    return view('artwork_detail', [
        'artwork' => $artwork,
    ]);
})->name('artwork.detail');

Route::get('/expositions', function () {
    return view('expositions', [
        'exhibitions' => \App\Models\Exhibition::latest()->get(),
        'artworks' => \App\Models\Artwork::with('artist')->latest()->get(), // <-- C'est la ligne qui manquait
    ]);
})->name('expositions');

// Page Nouvelles
Route::get('/nouvelles', function () {
    return view('nouvelles', [
        'news' => News::latest()->get(),
    ]);
})->name('nouvelles');

// Page détail d'une nouvelle
Route::get('/nouvelle/{slug}', function ($slug) {
    $news = News::where('slug', $slug)->firstOrFail();
    return view('nouvelle_detail', [
        'news' => $news,
    ]);
})->name('nouvelle.detail');

// Page Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Routes Breeze (Auth, Dashboard, etc.)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
