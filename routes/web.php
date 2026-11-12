<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('home');
})->name('home');

// Vos pages publiques
Route::get('/artistes', function () {
    return view('artists');
})->name('artists');

Route::get('/oeuvres', function () {
    return view('artworks');
})->name('artworks');

Route::get('/artiste-detail', function () {
    return view('artist_detail');
})->name('artist.detail');

Route::get('/oeuvre-detail', function () {
    return view('artwork_detail');
})->name('artwork.detail');

Route::get('/expositions', function () {
    return view('expositions');
})->name('expositions');

Route::get('/nouvelles', function () {
    return view('nouvelles');
})->name('nouvelles');

Route::get('/nouvelle-detail', function () {
    return view('nouvelle_detail');
})->name('nouvelle.detail');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Routes générées par Laravel Breeze (Dashboard, Profil, etc.)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ne pas oublier d'inclure les routes d'authentification à la fin
require __DIR__.'/auth.php';
