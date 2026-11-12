@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4 py-16 max-w-7xl">

        <!-- Section Biographie -->
        <div class="flex flex-col lg:flex-row gap-12 mb-24">

            <!-- Colonne de Gauche : Texte -->
            <div class="w-full lg:w-1/2">
                <h1 class="text-4xl lg:text-5xl font-normal mb-8 text-[#1a1a1a]">{{ $artist->name }}</h1>

                <div class="space-y-4 text-gray-700 leading-relaxed font-light text-sm lg:text-base">
                    {!! nl2br(e($artist->biography)) !!}
                </div>

                <!-- Bouton Télécharger -->
                <div class="mt-10">
                    <button class="border border-gray-400 text-gray-600 px-6 py-2.5 text-sm hover:border-black hover:text-black transition">
                        Biographie à télécharger
                    </button>
                </div>
            </div>

            <!-- Colonne de Droite : Image Principale -->
            <div class="w-full lg:w-1/2">
                @if($artist->photo)
                    <img src="{{ asset('storage/' . $artist->photo) }}"
                         alt="{{ $artist->name }}"
                         class="w-full h-[400px] lg:h-[500px] object-cover">
                @else
                    <div class="bg-[#dcdcdc] w-full h-[400px] lg:h-[500px] flex items-center justify-center text-gray-400">
                        Portrait de {{ $artist->name }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Section Grille d'Œuvres de l'artiste -->
        <div class="border-t border-gray-100 pt-16">
            <h2 class="text-3xl font-normal mb-10 text-[#1a1a1a]">Œuvres de {{ $artist->name }}</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 items-start">

                @forelse($artworks as $artwork)
                    <a href="{{ route('artwork.detail', $artwork->slug) }}" class="block bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                        <div class="h-96 bg-gray-200 overflow-hidden">
                            @if($artwork->image)
                                <img src="{{ asset('storage/' . $artwork->image) }}"
                                     alt="{{ $artwork->title }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">Image</div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-medium text-sm">{{ $artwork->title }}</h3>
                            <p class="text-sm text-gray-500 italic mt-1">{{ $artwork->technique }}</p>
                            <p class="text-[11px] text-gray-400 mt-3">{{ $artwork->year }}</p>
                            <p class="text-[11px] text-gray-400">{{ $artwork->dimensions }}</p>
                            <span class="text-xs border-b border-black pb-0.5 inline-block mt-3">En savoir plus</span>
                        </div>
                    </a>
                @empty
                    <p class="col-span-4 text-gray-500 text-center py-8">Aucune œuvre pour cet artiste pour le moment.</p>
                @endforelse

            </div>
        </div>
    </section>
@endsection
