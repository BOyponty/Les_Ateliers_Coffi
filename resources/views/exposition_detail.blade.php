@extends('layouts.app')

@section('content')
    <article class="container mx-auto px-4 py-16 max-w-5xl">

        <!-- Bouton Retour -->
        <div class="mb-8">
            <a href="{{ route('expositions') }}" class="text-sm text-gray-500 hover:text-black inline-flex items-center gap-2 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Retour aux expositions
            </a>
        </div>

        <!-- En-tête de l'exposition -->
        <header class="text-center mb-12">
            <!-- Badge de statut -->
            <div class="mb-4">
                <span class="inline-block px-4 py-1.5 text-xs font-medium rounded-full
                    {{ $exhibition->status === 'à venir' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $exhibition->status === 'en cours' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $exhibition->status === 'passée' ? 'bg-gray-100 text-gray-800' : '' }}">
                    {{ ucfirst($exhibition->status ?? 'Exposition') }}
                </span>
            </div>
            <h1 class="text-3xl md:text-4xl font-serif font-medium mb-4 text-[#1a1a1a]">{{ $exhibition->title }}</h1>
            <p class="text-lg text-gray-500">{{ $exhibition->start_date }} - {{ $exhibition->end_date }}</p>
        </header>

        <!-- Deux images côte à côte -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            <!-- Image 1 -->
            <div class="h-[400px] rounded-lg overflow-hidden bg-gray-200">
                @if($exhibition->image)
                    <img src="{{ asset('storage/' . $exhibition->image) }}"
                         alt="{{ $exhibition->title }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-400">Image non disponible</div>
                @endif
            </div>
            <!-- Image 2 -->
            <div class="h-[400px] rounded-lg overflow-hidden bg-gray-200">
                @if($exhibition->image_2)
                    <img src="{{ asset('storage/' . $exhibition->image_2) }}"
                         alt="{{ $exhibition->title }} - image 2"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-400">Image non disponible</div>
                @endif
            </div>
        </div>

        <!-- Description -->
        <div class="prose max-w-none text-gray-700 leading-relaxed text-base md:text-lg mb-12">
            {!! nl2br(e($exhibition->description)) !!}
        </div>

        <!-- Informations pratiques (si l'exposition est à venir ou en cours) -->
        @if($exhibition->status !== 'passée')
            <div class="bg-white border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] p-8 mb-12">
                <h2 class="text-xl font-serif mb-6">Informations pratiques</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Lieu</p>
                        <p class="text-lg">Les Ateliers Coffi, Fidjrossè, Cotonou</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Horaires</p>
                        <p class="text-lg">Du mardi au dimanche, de 10h à 18h</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Bouton Retour en bas -->
        <div class="flex justify-center mt-12">
            <a href="{{ route('expositions') }}" class="text-sm text-gray-500 hover:text-black transition">
                &larr; Retour à toutes les expositions
            </a>
        </div>

    </article>
@endsection
