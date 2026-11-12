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
                        <button @click="activeFilter = 'charbel'"
                                :class="activeFilter === 'charbel' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                                class="px-4 py-1.5 border text-sm rounded transition">Charbel Coffi</button>
                        <button @click="activeFilter = 'sika'"
                                :class="activeFilter === 'sika' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                                class="px-4 py-1.5 border text-sm rounded transition">Sika da Silveira</button>
                        <button @click="activeFilter = 'princesse'"
                                :class="activeFilter === 'princesse' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                                class="px-4 py-1.5 border text-sm rounded transition">Princesse Keirath</button>
                        <button @click="activeFilter = 'jamal'"
                                :class="activeFilter === 'jamal' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                                class="px-4 py-1.5 border text-sm rounded transition">Jamal Chleuh</button>
                        <button @click="activeFilter = 'zanele'"
                                :class="activeFilter === 'zanele' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                                class="px-4 py-1.5 border text-sm rounded transition">Zanele Muholi</button>
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

                <!-- Carte 1 : Charbel Coffi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'charbel'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-[450px]">
                        <div class="w-full h-full bg-[#e67e22] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Réconciliation, 2024</p>
                        <p class="text-[11px] text-gray-400 mt-3">Technique mixte</p>
                        <p class="text-[11px] text-gray-400">Kaolin et latérite</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 2 : Sika da Silveira -->
                <div x-show="activeFilter === 'all' || activeFilter === 'sika'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-72">
                        <div class="w-full h-full bg-[#2c3e50] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Sika da Silveira</a>
                        <p class="text-sm text-gray-500 italic mt-1">Celles qui transmettent, 2026</p>
                        <p class="text-[11px] text-gray-400 mt-3">Peinture</p>
                        <p class="text-[11px] text-gray-400">Acrylique sur toile</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 3 : Princesse Keirath -->
                <div x-show="activeFilter === 'all' || activeFilter === 'princesse'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-60">
                        <div class="w-full h-full bg-[#2c3e50] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Princesse Keirath</a>
                        <p class="text-sm text-gray-500 italic mt-1">Transmission, 2026</p>
                        <p class="text-[11px] text-gray-400 mt-3">Sculpture</p>
                        <p class="text-[11px] text-gray-400">Bois et métal</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 4 : Jamal Chleuh -->
                <div x-show="activeFilter === 'all' || activeFilter === 'jamal'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-[420px]">
                        <div class="w-full h-full bg-gray-300 group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-gray-500">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Jamal Chleuh</a>
                        <p class="text-sm text-gray-500 italic mt-1">L'Art nous unit, 2025</p>
                        <p class="text-[11px] text-gray-400 mt-3">Mode & Peinture</p>
                        <p class="text-[11px] text-gray-400">Textile et peinture</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 5 : Zanele Muholi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'zanele'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-[380px]">
                        <div class="w-full h-full bg-gray-400 group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Zanele Muholi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Dig Where You Stand, 2024</p>
                        <p class="text-[11px] text-gray-400 mt-3">Photographie</p>
                        <p class="text-[11px] text-gray-400">Tirage argentique</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 6 : Charbel Coffi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'charbel'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64">
                        <div class="w-full h-full bg-[#e67e22] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Rooted, 2025</p>
                        <p class="text-[11px] text-gray-400 mt-3">Installation</p>
                        <p class="text-[11px] text-gray-400">Terre et fibres</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 7 : Sika da Silveira -->
                <div x-show="activeFilter === 'all' || activeFilter === 'sika'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-72">
                        <div class="w-full h-full bg-[#a0522d] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Sika da Silveira</a>
                        <p class="text-sm text-gray-500 italic mt-1">Féminin pluriel, 2025</p>
                        <p class="text-[11px] text-gray-400 mt-3">Peinture</p>
                        <p class="text-[11px] text-gray-400">Huile sur toile</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 8 : Princesse Keirath -->
                <div x-show="activeFilter === 'all' || activeFilter === 'princesse'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-[400px]">
                        <div class="w-full h-full bg-gray-400 group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Princesse Keirath</a>
                        <p class="text-sm text-gray-500 italic mt-1">Mémoire, 2024</p>
                        <p class="text-[11px] text-gray-400 mt-3">Sculpture</p>
                        <p class="text-[11px] text-gray-400">Bronze</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 9 : Jamal Chleuh -->
                <div x-show="activeFilter === 'all' || activeFilter === 'jamal'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-80">
                        <div class="w-full h-full bg-[#8e44ad] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Jamal Chleuh</a>
                        <p class="text-sm text-gray-500 italic mt-1">Bénin Brille, 2025</p>
                        <p class="text-[11px] text-gray-400 mt-3">Mode</p>
                        <p class="text-[11px] text-gray-400">Wax et perles</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 10 : Zanele Muholi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'zanele'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64">
                        <div class="w-full h-full bg-[#3498db] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Zanele Muholi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Somnyama Ngonyama, 2023</p>
                        <p class="text-[11px] text-gray-400 mt-3">Photographie</p>
                        <p class="text-[11px] text-gray-400">Noir et blanc</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 11 : Charbel Coffi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'charbel'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-80">
                        <div class="w-full h-full bg-[#1a1a1a] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Écologie, 2023</p>
                        <p class="text-[11px] text-gray-400 mt-3">Technique mixte</p>
                        <p class="text-[11px] text-gray-400">Matériaux recyclés</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 12 : Sika da Silveira -->
                <div x-show="activeFilter === 'all' || activeFilter === 'sika'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-80">
                        <div class="w-full h-full bg-[#ecf0f1] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-gray-500">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Sika da Silveira</a>
                        <p class="text-sm text-gray-500 italic mt-1">Racines, 2024</p>
                        <p class="text-[11px] text-gray-400 mt-3">Peinture</p>
                        <p class="text-[11px] text-gray-400">Acrylique</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 13 : Princesse Keirath -->
                <div x-show="activeFilter === 'all' || activeFilter === 'princesse'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-56">
                        <div class="w-full h-full bg-[#f1c40f] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Princesse Keirath</a>
                        <p class="text-sm text-gray-500 italic mt-1">Héritage, 2025</p>
                        <p class="text-[11px] text-gray-400 mt-3">Sculpture</p>
                        <p class="text-[11px] text-gray-400">Pierre</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 14 : Jamal Chleuh -->
                <div x-show="activeFilter === 'all' || activeFilter === 'jamal'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-80">
                        <div class="w-full h-full bg-[#95a5a6] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Jamal Chleuh</a>
                        <p class="text-sm text-gray-500 italic mt-1">Fusion, 2024</p>
                        <p class="text-[11px] text-gray-400 mt-3">Mode</p>
                        <p class="text-[11px] text-gray-400">Soie et coton</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 15 : Zanele Muholi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'zanele'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-48">
                        <div class="w-full h-full bg-[#e74c3c] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Zanele Muholi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Identité, 2022</p>
                        <p class="text-[11px] text-gray-400 mt-3">Photographie</p>
                        <p class="text-[11px] text-gray-400">Portrait</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte 16 : Charbel Coffi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'charbel'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-[420px]">
                        <div class="w-full h-full bg-[#d2b48c] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Identité, 2022</p>
                        <p class="text-[11px] text-gray-400 mt-3">Technique mixte</p>
                        <p class="text-[11px] text-gray-400">Terre cuite</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
