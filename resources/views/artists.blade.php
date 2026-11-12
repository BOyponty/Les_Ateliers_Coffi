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
                <span>&darr;</span> Filtre
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

                <!-- Par technique (statique) -->
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

        <!-- Section Grille Masonry avec filtrage -->
        <section class="container mx-auto px-4 pb-16 max-w-7xl">
            <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">

                <!-- On boucle 3 fois sur les artistes pour remplir la grille comme sur la maquette -->
                @for ($i = 0; $i < 3; $i++)
                    @foreach($artists as $artist)
                        <div x-show="activeFilter === 'all' || activeFilter === '{{ $artist->slug }}'"
                             class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">

                            <!-- Hauteur variable pour l'effet Masonry -->
                            <div class="overflow-hidden {{ $loop->index % 3 == 0 ? 'h-96' : ($loop->index % 2 == 0 ? 'h-64' : 'h-80') }}">
                                @if($artist->photo)
                                    <img src="{{ asset('storage/' . $artist->photo) }}"
                                         alt="{{ $artist->name }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">{{ $artist->name }}</div>
                                @endif
                            </div>
                            <div class="p-4 bg-white relative z-10">
                                <a href="{{ route('artist.detail', $artist->slug) }}" class="block font-medium text-lg group-hover:text-gray-600 transition-colors">{{ $artist->name }}</a>
                                <p class="text-sm text-gray-500 italic mt-1">{{ $artist->specialty }}</p>
                            </div>
                        </div>
                    @endforeach
                @endfor

            </div>
        </section>
    </div>
@endsection
