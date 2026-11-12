@extends('layouts.app')

@section('content')
    <!-- On garde le x-data global pour les filtres -->
    <div x-data="{ activeFilter: 'all' }">

        <!-- Section Carrousel (Expositions) -->
        <section class="container mx-auto px-4 py-8 max-w-7xl" x-data="{
            activeSlide: 0,
            slides: [
                @foreach($exhibitions as $index => $exhibition)
                    {
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
                }, 10000);
            }
        }">
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
                <button @click="activeFilter = 'all'"
                        :class="activeFilter === 'all' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                        class="px-5 py-2 border text-sm rounded transition">Tous</button>
                @foreach($artists as $artist)
                    <button @click="activeFilter = '{{ $artist->slug }}'"
                            :class="activeFilter === '{{ $artist->slug }}' ? 'bg-[#1a1a1a] text-white' : 'bg-white text-gray-800 border-gray-300 hover:border-black'"
                            class="px-5 py-2 border text-sm rounded transition">{{ $artist->name }}</button>
                @endforeach
            </div>
        </section>

        <!-- Section Grille Masonry (15 images) avec animations conservées -->
        <section class="container mx-auto px-4 py-8 max-w-7xl">
            <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">

                @foreach($artworks as $artwork)
                    <div x-show="activeFilter === 'all' || activeFilter === '{{ $artwork->artist->slug }}'"
                         class="masonry-card break-inside-avoid bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                        <!-- Conteneur de l'image avec hauteur variable pour le Masonry -->
                        <div class="overflow-hidden {{ $loop->index % 3 == 0 ? 'h-80' : ($loop->index % 2 == 0 ? 'h-64' : 'h-96') }}">
                            @if($artwork->image)
                                <img src="{{ asset('storage/' . $artwork->image) }}"
                                     alt="{{ $artwork->title }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">Image</div>
                            @endif
                        </div>
                        <div class="p-4">
                            <a href="{{ route('artist.detail', $artwork->artist->slug) }}" class="block font-medium text-lg hover:underline">{{ $artwork->artist->name }}</a>
                            <p class="text-sm text-gray-500 italic">{{ $artwork->title }}, {{ $artwork->year }}</p>
                            <p class="text-xs text-gray-400 mt-3">{{ $artwork->technique }}</p>
                            <p class="text-xs text-gray-400">{{ $artwork->dimensions }}</p>
                        </div>
                    </div>
                @endforeach

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
