@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-16 min-h-[60vh]">
        <div class="flex justify-between items-center mb-10 border-b border-gray-200 pb-6">
            <h1 class="text-3xl font-serif">Tableau de bord - Administration</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-red-600 hover:underline">Déconnexion</button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Statistiques -->
            <div class="bg-white p-8 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100">
                <p class="text-gray-500 text-sm mb-2">Œuvres en catalogue</p>
                <p class="text-4xl font-bold">{{ \App\Models\Artwork::count() }}</p>
            </div>
            <div class="bg-white p-8 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100">
                <p class="text-gray-500 text-sm mb-2">Artistes</p>
                <p class="text-4xl font-bold">{{ \App\Models\Artist::count() }}</p>
            </div>
            <div class="bg-white p-8 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100">
                <p class="text-gray-500 text-sm mb-2">Demandes de contact</p>
                <p class="text-4xl font-bold">{{ \App\Models\ContactRequest::count() ?? 0 }}</p>
            </div>
        </div>

        <!-- Actions rapides -->
        <h2 class="text-xl font-medium mb-6">Actions rapides</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

            <!-- Bouton Ajouter une œuvre -->
            <a href="{{ route('admin.artworks.create') }}" class="bg-[#1a1a1a] text-white p-6 text-center hover:bg-gray-800 transition flex flex-col items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Ajouter une œuvre
            </a>

            <!-- Bouton Ajouter un artiste (corrigé) -->
            <a href="{{ route('admin.artists.create') }}" class="bg-white border border-gray-200 text-gray-800 p-6 text-center hover:bg-gray-50 transition flex flex-col items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Ajouter un artiste
            </a>

            <!-- Bouton Créer une exposition -->
            <a href="#" class="bg-white border border-gray-200 text-gray-800 p-6 text-center hover:bg-gray-50 transition flex flex-col items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Créer une exposition
            </a>

            <!-- Bouton Publier une actualité -->
            <a href="#" class="bg-white border border-gray-200 text-gray-800 p-6 text-center hover:bg-gray-50 transition flex flex-col items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Publier une actualité
            </a>
        </div>
    </div>
@endsection
