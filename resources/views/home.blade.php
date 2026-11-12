@extends('layouts.app')

@section('content')
    <!-- On englobe TOUT dans un seul x-data pour que les filtres agissent sur la grille -->
    <div x-data="{
        activeFilter: 'all',
        activeSlide: 0,
        slides: [
            { title: 'Dig Where You Stand', date: '15.03 - 30.06.2024', subtitle: 'EXPOSITION COLLECTIVE', desc: 'Une exposition collective majeure rassemblant plus de 20 artistes autour des thèmes de la décolonisation et de la restitution. Avec Zanele Muholi, Charbel Coffi et bien d\'autres.' },
            { title: 'Celles qui transmettent', date: '10.01 - 28.02.2026', subtitle: 'ARTISTES PLASTICIENNES', desc: 'Une exposition mettant en lumière des artistes plasticiennes comme Princesse Keirath ou Sika da Silveira sur le thème de la transmission et de la condition féminine.' },
            { title: 'Rooted - Charbel Coffi', date: '05.05 - 20.07.2025', subtitle: 'EXPOSITION PERSONNELLE', desc: 'Le fondateur des Ateliers Coffi explore la réconciliation culturelle et l\'écologie à travers des textures de kaolin et de latérite.' },
            { title: 'L\'Art nous unit, le Bénin brille !', date: '01.09 - 15.10.2025', subtitle: 'MODE & PEINTURE', desc: 'Un événement qui fusionne mode et peinture avec le designer Jamal Chleuh et les artistes résidents des Ateliers Coffi.' }
        ],
        nextSlide() {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        },
        init() {
            setInterval(() => {
                this.nextSlide();
            }, 10000);
        }
    }">

        <!-- Section Carrousel (Expositions) -->
        <section class="container mx-auto px-4 py-8 max-w-7xl">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 md:p-8 flex flex-col md:flex-row gap-8 items-center relative overflow-hidden">
                <!-- Images (Fixes) -->
                <div class="w-full md:w-5/12 flex gap-4">
                    <div class="w-1/2 h-56 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-sm">Illustration 1</div>
                    <div class="w-1/2 h-56 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-sm">Illustration 2</div>
                </div>

                <!-- Texte (Défilant) -->
                <div class="w-full md:w-7/12 relative min-h-[180px] flex flex-col justify-center">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="activeSlide === index"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 translate-x-10"
                             x-transition:enter-end="opacity-100 translate-x-0"
                             x-transition:leave="transition ease-in duration-300 absolute"
                             x-transition:leave-start="opacity-100 translate-x-0"
                             x-transition:leave-end="opacity-0 -translate-x-10">
                            <h2 class="font-serif text-xl md:text-2xl font-semibold mb-2" x-text="slide.title"></h2>
                            <p class="text-sm text-gray-500 mb-2" x-text="slide.date"></p>
                            <p class="text-lg font-medium mb-2" x-text="slide.subtitle"></p>
                            <p class="text-gray-600 leading-relaxed text-sm" x-text="slide.desc"></p>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-6 space-x-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index"
                            :class="activeSlide === index ? 'w-2.5 h-2.5 rounded-full bg-black' : 'w-2.5 h-2.5 rounded-full bg-gray-300 hover:bg-gray-400 transition'">
                    </button>
                </template>
            </div>
        </section>

        <!-- Section Filtres -->
        <section class="container mx-auto px-4 py-6 max-w-7xl">
            <div class="flex flex-wrap gap-3">
                <!-- Bouton Tous -->
                <button @click="activeFilter = 'all'"
                        :class="activeFilter === 'all' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                        class="px-5 py-2 border text-sm rounded transition">
                    Tous
                </button>
                <!-- Bouton Charbel Coffi -->
                <button @click="activeFilter = 'charbel'"
                        :class="activeFilter === 'charbel' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                        class="px-5 py-2 border text-sm rounded transition">
                    Charbel Coffi
                </button>
                <!-- Bouton Sika da Silveira -->
                <button @click="activeFilter = 'sika'"
                        :class="activeFilter === 'sika' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                        class="px-5 py-2 border text-sm rounded transition">
                    Sika da Silveira
                </button>
                <!-- Bouton Princesse Keirath -->
                <button @click="activeFilter = 'princesse'"
                        :class="activeFilter === 'princesse' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                        class="px-5 py-2 border text-sm rounded transition">
                    Princesse Keirath
                </button>
                <!-- Bouton Jamal Chleuh -->
                <button @click="activeFilter = 'jamal'"
                        :class="activeFilter === 'jamal' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                        class="px-5 py-2 border text-sm rounded transition">
                    Jamal Chleuh
                </button>
                <!-- Bouton Zanele Muholi -->
                <button @click="activeFilter = 'zanele'"
                        :class="activeFilter === 'zanele' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                        class="px-5 py-2 border text-sm rounded transition">
                    Zanele Muholi
                </button>
            </div>
        </section>

        <!-- Section Grille Masonry -->
        <section class="container mx-auto px-4 py-8 max-w-7xl">
            <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">

                <!-- Carte 1 : Charbel Coffi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'charbel'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-80 bg-[#e67e22] flex items-center justify-center text-white">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic">Réconciliation, 2024</p>
                        <p class="text-xs text-gray-400 mt-3">Kaolin et latérite</p>
                    </div>
                </div>

                <!-- Carte 2 : Sika da Silveira -->
                <div x-show="activeFilter === 'all' || activeFilter === 'sika'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-64 bg-[#a0522d] flex items-center justify-center text-white">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Sika da Silveira</a>
                        <p class="text-sm text-gray-500 italic">Celles qui transmettent, 2026</p>
                        <p class="text-xs text-gray-400 mt-3">Acrylique sur toile</p>
                    </div>
                </div>

                <!-- Carte 3 : Princesse Keirath -->
                <div x-show="activeFilter === 'all' || activeFilter === 'princesse'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Princesse Keirath</a>
                        <p class="text-sm text-gray-500 italic">Transmission, 2026</p>
                        <p class="text-xs text-gray-400 mt-3">Bois et métal</p>
                    </div>
                </div>

                <!-- Carte 4 : Jamal Chleuh -->
                <div x-show="activeFilter === 'all' || activeFilter === 'jamal'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-56 bg-[#2c3e50] flex items-center justify-center text-white">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Jamal Chleuh</a>
                        <p class="text-sm text-gray-500 italic">L'Art nous unit, 2025</p>
                        <p class="text-xs text-gray-400 mt-3">Textile et peinture</p>
                    </div>
                </div>

                <!-- Carte 5 : Zanele Muholi -->
                <div x-show="activeFilter === 'all' || activeFilter === 'zanele'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-80 bg-[#87ceeb] flex items-center justify-center text-gray-700">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Zanele Muholi</a>
                        <p class="text-sm text-gray-500 italic">Dig Where You Stand, 2024</p>
                        <p class="text-xs text-gray-400 mt-3">Tirage argentique</p>
                    </div>
                </div>

                <!-- Cartes 6 à 15 : J'ajoute d'autres cartes pour que le filtrage soit visible -->
                <div x-show="activeFilter === 'all' || activeFilter === 'charbel'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-56 bg-[#34495e] flex items-center justify-center text-white">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic">Rooted, 2025</p>
                        <p class="text-xs text-gray-400 mt-3">Terre et fibres</p>
                    </div>
                </div>
                <div x-show="activeFilter === 'all' || activeFilter === 'sika'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-80 bg-[#bdc3c7] flex items-center justify-center text-gray-700">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Sika da Silveira</a>
                        <p class="text-sm text-gray-500 italic">Féminin pluriel, 2025</p>
                        <p class="text-xs text-gray-400 mt-3">Huile sur toile</p>
                    </div>
                </div>
                <div x-show="activeFilter === 'all' || activeFilter === 'princesse'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-80 bg-[#d2b48c] flex items-center justify-center text-gray-700">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Princesse Keirath</a>
                        <p class="text-sm text-gray-500 italic">Mémoire, 2024</p>
                        <p class="text-xs text-gray-400 mt-3">Bronze</p>
                    </div>
                </div>
                <div x-show="activeFilter === 'all' || activeFilter === 'jamal'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-80 bg-[#8e44ad] flex items-center justify-center text-white">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Jamal Chleuh</a>
                        <p class="text-sm text-gray-500 italic">Bénin Brille, 2025</p>
                        <p class="text-xs text-gray-400 mt-3">Wax et perles</p>
                    </div>
                </div>
                <div x-show="activeFilter === 'all' || activeFilter === 'zanele'" class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="h-64 bg-[#3498db] flex items-center justify-center text-white">Image</div>
                    <div class="p-4">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-lg hover:underline">Zanele Muholi</a>
                        <p class="text-sm text-gray-500 italic">Somnyama Ngonyama, 2023</p>
                        <p class="text-xs text-gray-400 mt-3">Noir et blanc</p>
                    </div>
                </div>
                <!-- Vous pouvez continuer à ajouter des cartes... -->

            </div>
        </section>

        <!-- Section Newsletter -->
        <section class="container mx-auto px-4 py-16 max-w-7xl">
            <div class="border border-gray-200 rounded-lg p-8 md:p-12 max-w-4xl mx-auto">
                <h3 class="font-serif text-2xl mb-6">Inscrivez-vous à notre newsletter.</h3>
                <form class="space-y-4 max-w-2xl" @submit.prevent="alert('Merci ! Votre inscription sera effective avec le Backend.')">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input type="email" placeholder="Entrez votre email" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-black">
                    </div>
                    <button type="submit" class="px-6 py-3 bg-[#1a1a1a] text-white font-medium rounded hover:bg-gray-800 transition uppercase tracking-wider text-sm">S'inscrire</button>
                </form>
            </div>
        </section>
    </div>
@endsection
