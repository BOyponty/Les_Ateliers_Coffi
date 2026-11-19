<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ArtworkController;
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

// Redirection de /dashboard vers le tableau de bord admin
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// Groupe des routes admin (une seule définition)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD des œuvres
    Route::resource('artworks', ArtworkController::class)->except(['show']);
});

// Routes de profil (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD des œuvres
    Route::resource('artworks', ArtworkController::class)->except(['show']);

    // CRUD des artistes
    Route::resource('artists', \App\Http\Controllers\Admin\ArtistController::class)->except(['show']);
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD des œuvres
    Route::resource('artworks', ArtworkController::class)->except(['show']);

    // CRUD des artistes
    Route::resource('artists', \App\Http\Controllers\Admin\ArtistController::class)->except(['show']);

    // CRUD des expositions (à ajouter)
    Route::resource('exhibitions', \App\Http\Controllers\Admin\ExhibitionController::class)->except(['show']);
});
// Routes d'authentification de Breeze
require __DIR__.'/auth.php';


