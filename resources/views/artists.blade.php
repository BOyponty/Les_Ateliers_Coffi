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

                <!-- Par technique (exemple, on peut le laisser statique pour l'instant) -->
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

                <!-- Carte 1 : Charbel Coffi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'charbel'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-96">
                        <div class="w-full h-full bg-[#e67e22] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Charbel Coffi</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg group-hover:text-gray-600 transition-colors">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Artiste plasticien & Fondateur</p>
                    </div>
                </div>

                <!-- Carte 2 : Sika da Silveira -->
                <div x-show="activeFilter === 'all' || activeFilter === 'sika'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64">
                        <div class="w-full h-full bg-[#2c3e50] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Sika da Silveira</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg group-hover:text-gray-600 transition-colors">Sika da Silveira</a>
                        <p class="text-sm text-gray-500 italic mt-1">Peintre</p>
                    </div>
                </div>

                <!-- Carte 3 : Princesse Keirath -->
                <div x-show="activeFilter === 'all' || activeFilter === 'princesse'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-80">
                        <div class="w-full h-full bg-[#87ceeb] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Princesse Keirath</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg group-hover:text-gray-600 transition-colors">Princesse Keirath</a>
                        <p class="text-sm text-gray-500 italic mt-1">Sculptrice</p>
                    </div>
                </div>

                <!-- Carte 4 : Jamal Chleuh -->
                <div x-show="activeFilter === 'all' || activeFilter === 'jamal'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-48">
                        <div class="w-full h-full bg-gray-200 group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-gray-500">Jamal Chleuh</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg group-hover:text-gray-600 transition-colors">Jamal Chleuh</a>
                        <p class="text-sm text-gray-500 italic mt-1">Designer & Artiste</p>
                    </div>
                </div>

                <!-- Carte 5 : Zanele Muholi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'zanele'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-80">
                        <div class="w-full h-full bg-[#34495e] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Zanele Muholi</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg group-hover:text-gray-600 transition-colors">Zanele Muholi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Photographe</p>
                    </div>
                </div>

                <!-- Autres cartes pour remplir la page (toutes filtrées) -->
                <!-- Carte 6 : Charbel Coffi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'charbel'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64"><div class="w-full h-full bg-[#bdc3c7] flex items-center justify-center text-gray-500">Charbel Coffi</div></div>
                    <div class="p-4"><a href="{{ route('artist.detail') }}" class="block font-medium text-lg">Charbel Coffi</a><p class="text-sm text-gray-500 italic mt-1">Artiste plasticien</p></div>
                </div>
                <!-- Carte 7 : Sika da Silveira -->
                <div x-show="activeFilter === 'all' || activeFilter === 'sika'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-72"><div class="w-full h-full bg-[#d2b48c] flex items-center justify-center text-gray-500">Sika da Silveira</div></div>
                    <div class="p-4"><a href="{{ route('artist.detail') }}" class="block font-medium text-lg">Sika da Silveira</a><p class="text-sm text-gray-500 italic mt-1">Peintre</p></div>
                </div>
                <!-- Carte 8 : Princesse Keirath -->
                <div x-show="activeFilter === 'all' || activeFilter === 'princesse'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64"><div class="w-full h-full bg-[#8e44ad] flex items-center justify-center text-white/50">Princesse Keirath</div></div>
                    <div class="p-4"><a href="{{ route('artist.detail') }}" class="block font-medium text-lg">Princesse Keirath</a><p class="text-sm text-gray-500 italic mt-1">Sculptrice</p></div>
                </div>
                <!-- Carte 9 : Jamal Chleuh -->
                <div x-show="activeFilter === 'all' || activeFilter === 'jamal'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-80"><div class="w-full h-full bg-[#1a1a1a] flex items-center justify-center text-white/50">Jamal Chleuh</div></div>
                    <div class="p-4"><a href="{{ route('artist.detail') }}" class="block font-medium text-lg">Jamal Chleuh</a><p class="text-sm text-gray-500 italic mt-1">Designer</p></div>
                </div>
                <!-- Carte 10 : Zanele Muholi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'zanele'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64"><div class="w-full h-full bg-[#ecf0f1] flex items-center justify-center text-gray-500">Zanele Muholi</div></div>
                    <div class="p-4"><a href="{{ route('artist.detail') }}" class="block font-medium text-lg">Zanele Muholi</a><p class="text-sm text-gray-500 italic mt-1">Photographe</p></div>
                </div>
                <!-- Vous pouvez ajouter d'autres cartes... -->

            </div>
        </section>
    </div>
@endsection
