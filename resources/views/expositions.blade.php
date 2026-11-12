@extends('layouts.app')

@section('content')
    <!-- Section Carrousel (Mise en avant) avec Alpine.js -->
    <section class="container mx-auto px-4 py-8 max-w-7xl" x-data="{
        activeSlide: 0,
        slides: [
            {
                img1: 'bg-gray-300',
                img2: 'bg-gray-400',
                title: 'Dig Where You Stand',
                date: '15.03 - 30.06.2024',
                subtitle: 'EXPOSITION COLLECTIVE',
                desc: 'Une exposition collective majeure rassemblant plus de 20 artistes autour des thèmes de la décolonisation et de la restitution. Avec Zanele Muholi, Charbel Coffi et bien d\'autres.'
            },
            {
                img1: 'bg-[#e67e22]',
                img2: 'bg-[#2c3e50]',
                title: 'Celles qui transmettent',
                date: '10.01 - 28.02.2026',
                subtitle: 'ARTISTES PLASTICIENNES',
                desc: 'Une exposition mettant en lumière des artistes plasticiennes comme Princesse Keirath ou Sika da Silveira sur le thème de la transmission et de la condition féminine.'
            },
            {
                img1: 'bg-[#8e44ad]',
                img2: 'bg-[#d2b48c]',
                title: 'Rooted - Charbel Coffi',
                date: '05.05 - 20.07.2025',
                subtitle: 'EXPOSITION PERSONNELLE',
                desc: 'Le fondateur des Ateliers Coffi explore la réconciliation culturelle et l\'écologie à travers des textures de kaolin et de latérite.'
            },
            {
                img1: 'bg-[#f1c40f]',
                img2: 'bg-[#95a5a6]',
                title: 'L\'Art nous unit, le Bénin brille !',
                date: '01.09 - 15.10.2025',
                subtitle: 'MODE & PEINTURE',
                desc: 'Un événement qui fusionne mode et peinture avec le designer Jamal Chleuh et les artistes résidents des Ateliers Coffi.'
            }
        ],
        nextSlide() {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        },
        init() {
            setInterval(() => {
                this.nextSlide();
            }, 5000);
        }
    }">
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 md:p-8 flex flex-col md:flex-row gap-8 items-center overflow-hidden relative">

            <!-- Images (Défilantes) -->
            <div class="w-full md:w-5/12 flex gap-4 relative min-h-[224px]">
                <template x-for="(slide, index) in slides" :key="index">
                    <div class="w-full flex gap-4 absolute inset-0"
                         x-show="activeSlide === index"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 translate-x-20"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-500 absolute"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-20">
                        <div class="w-1/2 h-56 rounded-lg flex items-center justify-center text-white/50" :class="slide.img1">
                            Illustration 1
                        </div>
                        <div class="w-1/2 h-56 rounded-lg flex items-center justify-center text-white/50" :class="slide.img2">
                            Illustration 2
                        </div>
                    </div>
                </template>
            </div>

            <!-- Texte (Défilant) -->
            <div class="w-full md:w-7/12 relative min-h-[180px] flex flex-col justify-center">
                <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="activeSlide === index"
                         x-transition:enter="transition ease-out duration-700 delay-200"
                         x-transition:enter-start="opacity-0 translate-x-10"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-300 absolute"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-10">
                        <h2 class="font-serif text-xl md:text-2xl font-semibold mb-3" x-text="slide.title"></h2>
                        <p class="text-sm text-gray-500 mb-3" x-text="slide.date"></p>
                        <p class="text-lg font-medium mb-3" x-text="slide.subtitle"></p>
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

    <!-- Section Grille Masonry (15 images) avec animations -->
    <section class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">

            <!-- Colonne 1 -->
            <div class="space-y-6 flex flex-col">
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-96">
                        <div class="w-full h-full bg-[#e67e22] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 1</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Réconciliation</p>
                        <p class="text-[11px] text-gray-400 mt-3">2024</p>
                        <p class="text-[11px] text-gray-400">Kaolin et latérite</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64">
                        <div class="w-full h-full bg-gray-200 group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-gray-500">Image 2</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Sika da Silveira</a>
                        <p class="text-sm text-gray-500 italic mt-1">Celles qui transmettent</p>
                        <p class="text-[11px] text-gray-400 mt-3">2026</p>
                        <p class="text-[11px] text-gray-400">Peinture</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64">
                        <div class="w-full h-full bg-gray-200 group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-gray-500">Image 3</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Princesse Keirath</a>
                        <p class="text-sm text-gray-500 italic mt-1">Transmission</p>
                        <p class="text-[11px] text-gray-400 mt-3">2026</p>
                        <p class="text-[11px] text-gray-400">Sculpture</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
            </div>

            <!-- Colonne 2 -->
            <div class="space-y-6 flex flex-col">
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-48">
                        <div class="w-full h-full bg-[#2c3e50] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 4</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Jamal Chleuh</a>
                        <p class="text-sm text-gray-500 italic mt-1">L'Art nous unit</p>
                        <p class="text-[11px] text-gray-400 mt-3">2025</p>
                        <p class="text-[11px] text-gray-400">Mode & Peinture</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-96">
                        <div class="w-full h-full bg-[#87ceeb] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 5</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Zanele Muholi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Dig Where You Stand</p>
                        <p class="text-[11px] text-gray-400 mt-3">2024</p>
                        <p class="text-[11px] text-gray-400">Photographie</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64">
                        <div class="w-full h-full bg-gray-200 group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-gray-500">Image 6</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Rooted</p>
                        <p class="text-[11px] text-gray-400 mt-3">2025</p>
                        <p class="text-[11px] text-gray-400">Installation</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64">
                        <div class="w-full h-full bg-[#34495e] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 7</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Sika da Silveira</a>
                        <p class="text-sm text-gray-500 italic mt-1">Féminin pluriel</p>
                        <p class="text-[11px] text-gray-400 mt-3">2025</p>
                        <p class="text-[11px] text-gray-400">Peinture</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
            </div>

            <!-- Colonne 3 -->
            <div class="space-y-6 flex flex-col">
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-96">
                        <div class="w-full h-full bg-[#bdc3c7] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-gray-500">Image 8</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Princesse Keirath</a>
                        <p class="text-sm text-gray-500 italic mt-1">Mémoire</p>
                        <p class="text-[11px] text-gray-400 mt-3">2024</p>
                        <p class="text-[11px] text-gray-400">Sculpture</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-[500px]">
                        <div class="w-full h-full bg-[#d2b48c] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 9</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Jamal Chleuh</a>
                        <p class="text-sm text-gray-500 italic mt-1">Fusion</p>
                        <p class="text-[11px] text-gray-400 mt-3">2024</p>
                        <p class="text-[11px] text-gray-400">Mode</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
            </div>

            <!-- Colonne 4 -->
            <div class="space-y-6 flex flex-col">
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-80">
                        <div class="w-full h-full bg-[#8e44ad] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 10</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Zanele Muholi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Somnyama Ngonyama</p>
                        <p class="text-[11px] text-gray-400 mt-3">2023</p>
                        <p class="text-[11px] text-gray-400">Photographie</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-96">
                        <div class="w-full h-full bg-[#3498db] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 11</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Charbel Coffi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Écologie</p>
                        <p class="text-[11px] text-gray-400 mt-3">2023</p>
                        <p class="text-[11px] text-gray-400">Technique mixte</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-96">
                        <div class="w-full h-full bg-[#1a1a1a] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 12</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Sika da Silveira</a>
                        <p class="text-sm text-gray-500 italic mt-1">Racines</p>
                        <p class="text-[11px] text-gray-400 mt-3">2024</p>
                        <p class="text-[11px] text-gray-400">Peinture</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
            </div>

            <!-- Colonne 5 -->
            <div class="space-y-6 flex flex-col">
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-80">
                        <div class="w-full h-full bg-[#ecf0f1] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-gray-500">Image 13</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Princesse Keirath</a>
                        <p class="text-sm text-gray-500 italic mt-1">Héritage</p>
                        <p class="text-[11px] text-gray-400 mt-3">2025</p>
                        <p class="text-[11px] text-gray-400">Sculpture</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-64">
                        <div class="w-full h-full bg-[#f1c40f] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 14</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Jamal Chleuh</a>
                        <p class="text-sm text-gray-500 italic mt-1">Bénin Brille</p>
                        <p class="text-[11px] text-gray-400 mt-3">2025</p>
                        <p class="text-[11px] text-gray-400">Mode</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">
                    <div class="overflow-hidden h-96">
                        <div class="w-full h-full bg-[#95a5a6] group-hover:scale-110 transition-transform duration-700 ease-in-out flex items-center justify-center text-white/50">Image 15</div>
                    </div>
                    <div class="p-4 bg-white relative z-10">
                        <a href="{{ route('artist.detail') }}" class="block font-medium text-sm group-hover:text-gray-600 transition-colors">Zanele Muholi</a>
                        <p class="text-sm text-gray-500 italic mt-1">Identité</p>
                        <p class="text-[11px] text-gray-400 mt-3">2022</p>
                        <p class="text-[11px] text-gray-400">Photographie</p>
                        <a href="{{ route('artwork.detail') }}" class="text-xs border-b border-black pb-0.5 inline-block mt-3 group-hover:border-gray-500 transition-colors">En savoir plus</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
