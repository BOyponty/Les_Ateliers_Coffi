@extends('layouts.app')

@section('content')
    <!-- Section Carrousel (Mise en avant) avec Alpine.js -->
    <section class="container mx-auto px-4 py-8 max-w-7xl" x-data="{
        activeSlide: 0,
        slides: [
            @foreach($exhibitions as $index => $exhibition)
                {
                    image: '{{ $exhibition->image ? asset('storage/' . $exhibition->image) : '' }}',
                    image_2: '{{ $exhibition->image_2 ? asset('storage/' . $exhibition->image_2) : '' }}',
                    title: '{{ addslashes($exhibition->title) }}',
                    date: '{{ $exhibition->start_date }} - {{ $exhibition->end_date }}',
                    subtitle: 'EXPOSITION',
                    desc: '{{ addslashes($exhibition->description) }}'
                }{{ $loop->last ? '' : ',' }}
            @endforeach
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

            <!-- Images (Défilantes - DEUX images côte à côte) -->
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
                        <div class="w-1/2 h-56 rounded-lg overflow-hidden bg-gray-200">
                            <template x-if="slide.image">
                                <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!slide.image">
                                <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">Image 1</div>
                            </template>
                        </div>
                        <div class="w-1/2 h-56 rounded-lg overflow-hidden bg-gray-200">
                            <template x-if="slide.image_2">
                                <img :src="slide.image_2" :alt="slide.title" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!slide.image_2">
                                <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">Image 2</div>
                            </template>
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

    <!-- Section Grille Masonry (expositions réelles, sans doublon) -->
    <section class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">

            @forelse($exhibitions as $exhibition)
                <div class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group cursor-pointer">

                    <!-- Image avec hauteur variable pour le Masonry -->
                    <div class="overflow-hidden {{ $loop->index % 4 == 0 ? 'h-96' : ($loop->index % 3 == 0 ? 'h-64' : ($loop->index % 2 == 0 ? 'h-80' : 'h-72')) }}">
                        @if($exhibition->image)
                            <img src="{{ asset('storage/' . $exhibition->image) }}"
                                 alt="{{ $exhibition->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                                Image non disponible
                            </div>
                        @endif
                    </div>

                    <!-- Contenu de la carte -->
                    <div class="p-4 bg-white relative z-10">
                        <h3 class="font-serif text-lg font-medium mb-1 leading-tight">{{ $exhibition->title }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $exhibition->start_date }} - {{ $exhibition->end_date }}</p>
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 mb-4">
                            {{ Str::limit($exhibition->description, 100) }}
                        </p>
                        <a href="{{ route('exposition.detail', $exhibition->slug) }}"
                           class="text-xs font-medium border-b border-black pb-0.5 inline-block hover:opacity-70 transition">
                            En savoir plus
                        </a>
                    </div>
                </div>
            @empty
                <p class="col-span-5 text-center text-gray-500 py-12">Aucune exposition pour le moment.</p>
            @endforelse

        </div>
    </section>
@endsection
