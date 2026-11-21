<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ArtworkController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\ExhibitionController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;
use App\Http\Controllers\Admin\ContactRequestController as AdminContactRequestController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\NewsletterController;
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

// Route pour le formulaire de contact (modal)
Route::post('/contact-request', [ContactRequestController::class, 'store'])->name('contact.request.store');

// Newsletter (formulaire public)
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

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

// Groupe admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD des œuvres
    Route::resource('artworks', ArtworkController::class)->except(['show']);

    // CRUD des artistes
    Route::resource('artists', ArtistController::class)->except(['show']);

    // CRUD des expositions
    Route::resource('exhibitions', ExhibitionController::class)->except(['show']);

    // CRUD des actualités
    Route::resource('news', NewsController::class)->except(['show']);

    // Gestion des demandes de contact
    Route::resource('contacts', AdminContactRequestController::class)->only(['index', 'show', 'update', 'destroy']);

    // Gestion des abonnés newsletter
    Route::get('/newsletter', [AdminNewsletterController::class, 'index'])->name('newsletter.index');
});

// Routes de profil (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/expositions', function () {
    return view('expositions', [
        'exhibitions' => Exhibition::latest()->get(),
        'artworks' => Artwork::with('artist')->latest()->get(),
    ]);
})->name('expositions');

// Routes d'authentification de Breeze
require __DIR__.'/auth.php';
