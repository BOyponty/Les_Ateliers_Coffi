@extends('layouts.app')

@section('content')
    <!-- On initialise la variable Alpine pour gérer l'ouverture du modal -->
    <section class="container mx-auto px-4 py-12 max-w-7xl" x-data="{ infoModalOpen: false }">

        <div class="flex flex-col lg:flex-row gap-16">
            <!-- Colonne de Gauche : Images -->
            <div class="w-full lg:w-1/2 flex flex-col gap-4">
                <div class="bg-[#dcdcdc] rounded-xl w-full h-[500px] lg:h-[650px] overflow-hidden">
                    @if($artwork->image)
                        <img src="{{ asset('storage/' . $artwork->image) }}"
                             alt="{{ $artwork->title }}"
                             class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="flex gap-4">
                    <div class="bg-[#dcdcdc] rounded-xl w-32 h-32 lg:w-40 lg:h-40"></div>
                    <div class="bg-[#dcdcdc] rounded-xl w-32 h-32 lg:w-40 lg:h-40"></div>
                </div>
            </div>

            <!-- Colonne de Droite : Informations -->
            <div class="w-full lg:w-1/2 flex flex-col pt-2 lg:pt-4">
                <!-- Le titre est maintenant un lien vers la page Artiste -->
                <a href="{{ route('artist.detail', $artwork->artist->slug) }}" class="block text-4xl lg:text-5xl font-normal mb-6 text-[#1a1a1a] hover:opacity-70 transition">
                    {{ $artwork->artist->name }}
                </a>

                <div class="space-y-2 text-lg lg:text-xl text-[#666666] font-light leading-relaxed max-w-lg">
                    <p>{{ $artwork->title }}, {{ $artwork->year }}</p>
                    <p>{{ $artwork->technique }}</p>
                    <p>{{ $artwork->dimensions }}</p>
                    <p>{{ $artwork->price ? number_format($artwork->price, 0, ',', ' ') . ' FCFA' : 'Prix sur demande' }}</p>
                    <p>{{ $artwork->description }}</p>
                </div>

                <!-- Bouton Plus d'info qui ouvre le modal -->
                <div class="mt-8">
                    <button @click="infoModalOpen = true" class="bg-[#555555] text-white px-8 py-3 rounded hover:bg-[#1a1a1a] transition text-base">
                        Plus d'info
                    </button>
                </div>

                <!-- Partage Social -->
                <div class="mt-24">
                    <p class="text-lg mb-4 text-[#1a1a1a]">Partager sur</p>
                    <div class="flex space-x-3">
                        <a href="#" class="bg-[#1a1a1a] text-white p-2.5 rounded-full hover:bg-gray-600 transition flex items-center justify-center w-10 h-10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="bg-[#1a1a1a] text-white p-2.5 rounded-full hover:bg-gray-600 transition flex items-center justify-center w-10 h-10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.951-7.252 4.183 0 7.442 2.986 7.442 6.969 0 4.157-2.623 7.503-6.261 7.503-1.223 0-2.373-.635-2.767-1.385l-.75 2.863c-.272 1.046-1.009 2.354-1.503 3.152 1.136.352 2.346.544 3.603.544 6.621 0 11.987-5.367 11.987-11.987C24 5.367 18.637 0 12.017 0z"/></svg>
                        </a>
                        <a href="#" class="bg-[#1a1a1a] text-white p-2.5 rounded-full hover:bg-gray-600 transition flex items-center justify-center w-10 h-10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="#" class="bg-[#1a1a1a] text-white p-2.5 rounded-full hover:bg-gray-600 transition flex items-center justify-center w-10 h-10">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL / POPUP DE CONTACT -->
        <div x-show="infoModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm p-4 overflow-y-auto">

            <!-- Conteneur du Modal -->
            <div @click.away="infoModalOpen = false" class="bg-white w-full max-w-5xl relative flex flex-col md:flex-row shadow-2xl my-8">

                <!-- Bouton Fermer (Croix noire) -->
                <button @click="infoModalOpen = false" class="absolute top-0 right-0 bg-[#0f1713] text-white w-12 h-12 flex items-center justify-center hover:bg-gray-800 transition z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Colonne Gauche : Titre et Image -->
                <div class="w-full md:w-1/2 p-10 md:p-14 flex flex-col">
                    <h2 class="text-2xl font-normal mb-8 text-[#1a1a1a]">{{ $artwork->title }}</h2>
                    @if($artwork->image)
                        <img src="{{ asset('storage/' . $artwork->image) }}"
                             alt="{{ $artwork->title }}"
                             class="w-full h-72 md:h-80 object-cover">
                    @else
                        <div class="bg-[#dcdcdc] w-full h-72 md:h-80"></div>
                    @endif
                </div>

                <!-- Colonne Droite : Formulaire -->
                <div class="w-full md:w-1/2 p-10 md:p-14 pt-4 md:pt-14 flex flex-col justify-center">
                    <form @submit.prevent class="space-y-4">

                        <!-- Nom & Prénom -->
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" placeholder="Nom" class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-black">
                            <input type="text" placeholder="Prénom" class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-black">
                        </div>

                        <!-- Email -->
                        <input type="email" placeholder="Email" class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-black">

                        <!-- Téléphone & Sujet -->
                        <div class="grid grid-cols-2 gap-4">
                            <input type="tel" placeholder="Téléphone" class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-black">
                            <input type="text" value="{{ $artwork->title }}" readonly class="w-full border border-gray-300 px-4 py-3 text-sm bg-gray-50 text-gray-600 focus:outline-none">
                        </div>

                        <!-- Message -->
                        <textarea placeholder="Message" rows="5" class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-black resize-none"></textarea>

                        <!-- Bouton Envoyer -->
                        <button type="submit" class="w-full bg-[#0f1713] text-white py-4 text-sm tracking-wider uppercase hover:bg-black transition mt-2">
                            Envoyer une demande d'information
                        </button>

                        <!-- Texte Légal -->
                        <p class="text-[11px] text-gray-600 leading-relaxed mt-4">
                            Nous traitons les données personnelles fournies conformément à la politique de confidentialité en vigueur.<br>
                            Vous pouvez vous désabonner à tout moment en cliquant sur le lien dans tous les courriels.
                        </p>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
