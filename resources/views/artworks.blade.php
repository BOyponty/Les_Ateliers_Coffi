@extends('layouts.app')

@section('content')
    <!-- On englobe TOUT dans un seul x-data pour que les filtres agissent sur la grille -->
    <div x-data="{
        activeFilter: 'all',
        filterOpen: false
    }">

        <!-- Section Filtres -->
        <section class="container mx-auto px-4 py-8 max-w-7xl">
            <!-- Bouton Filtre -->
            <h2 @click="filterOpen = !filterOpen" class="text-lg font-medium mb-6 flex items-center gap-2 cursor-pointer select-none hover:text-gray-600 transition">
                <span>&darr;</span> Filtrer les œuvres
            </h2>

            <!-- Contenu des filtres (masqué par défaut) -->
            <div x-show="filterOpen" x-transition x-cloak class="mb-10">

                <!-- Par artiste -->
                <div class="mb-6">
                    <p class="text-gray-500 mb-3">Par artiste</p>
                    <div class="flex flex-wrap gap-2">
                        <button @click="activeFilter = 'all'"
                                :class="activeFilter === 'all' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                                class="px-4 py-1.5 border text-sm rounded transition">Tous</button>
                        @foreach($artists as $artist)
                            <button @click="activeFilter = '{{ $artist->slug }}'"
                                    :class="activeFilter === '{{ $artist->slug }}' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                                    class="px-4 py-1.5 border text-sm rounded transition">{{ $artist->name }}</button>
                        @endforeach
                    </div>
                </div>

                <!-- Par technique (statique pour l'instant) -->
                <div class="mb-6">
                    <p class="text-gray-500 mb-3">Par technique</p>
                    <div class="flex flex-wrap gap-2">
                        <button class="px-4 py-1.5 bg-[#1a1a1a] text-white text-sm rounded transition">Tous</button>
                        <button class="px-4 py-1.5 border border-gray-300 text-sm rounded hover:border-black transition">Peinture (16)</button>
                        <button class="px-4 py-1.5 border border-gray-300 text-sm rounded hover:border-black transition">Sculpture (9)</button>
                        <button class="px-4 py-1.5 border border-gray-300 text-sm rounded hover:border-black transition">Photographie (6)</button>
                        <button class="px-4 py-1.5 border border-gray-300 text-sm rounded hover:border-black transition">Installation (2)</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Grille Masonry avec filtrage (16 œuvres) -->
        <section class="container mx-auto px-4 pb-16 max-w-7xl">
            <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-6 space-y-6">

                @php
                    // On répète la liste des œuvres pour obtenir 16 cartes
                    $allArtworks = $artworks->toArray();
                    $totalArtworks = count($allArtworks);
                @endphp

                @for ($i = 0; $i < 16; $i++)
                    @php
                        $artwork = $artworks[$i % $totalArtworks];
                        // On alterne les hauteurs selon l'index pour respecter votre disposition
                        $heightClass = '';
                        if ($i == 0) $heightClass = 'h-[450px]';
                        elseif ($i == 1) $heightClass = 'h-72';
                        elseif ($i == 2) $heightClass = 'h-60';
                        elseif ($i == 3) $heightClass = 'h-[420px]';
                        elseif ($i == 4) $heightClass = 'h-[380px]';
                        elseif ($i == 5) $heightClass = 'h-64';
                        elseif ($i == 6) $heightClass = 'h-72';
                        elseif ($i == 7) $heightClass = 'h-[400px]';
                        elseif ($i == 8) $heightClass = 'h-80';
                        elseif ($i == 9) $heightClass = 'h-64';
                        elseif ($i == 10) $heightClass = 'h-80';
                        elseif ($i == 11) $heightClass = 'h-80';
                        elseif ($i == 12) $heightClass = 'h-56';
                        elseif ($i == 13) $heightClass = 'h-80';
                        elseif ($i == 14) $heightClass = 'h-48';
                        elseif ($i == 15) $heightClass = 'h-[420px]';
                    @endphp

                    <div x-show="activeFilter === 'all' || activeFilter === '{{ $artwork->artist->slug }}'"
                         class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">

                        <!-- Image avec hauteur variable selon l'index -->
                        <div class="overflow-hidden {{ $heightClass }}">
                            @if($artwork->image)
                                <img src="{{ asset('storage/' . $artwork->image) }}"
                                     alt="{{ $artwork->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">Image</div>
                            @endif
                        </div>
                        <div class="p-4 bg-white relative z-10">
                            <a href="{{ route('artist.detail', $artwork->artist->slug) }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">{{ $artwork->artist->name }}</a>
                            <p class="text-sm text-gray-500 italic mt-1">{{ $artwork->title }}, {{ $artwork->year }}</p>
                            <p class="text-[11px] text-gray-400 mt-3">{{ $artwork->technique }}</p>
                            <p class="text-[11px] text-gray-400">{{ $artwork->dimensions }}</p>
                            <a href="{{ route('artwork.detail', $artwork->slug) }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                        </div>
                    </div>
                @endfor

            </div>
        </section>
    </div>
@endsection
