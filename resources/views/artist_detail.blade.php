@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4 py-16 max-w-7xl">

        <!-- Section Biographie -->
        <div class="flex flex-col lg:flex-row gap-12 mb-24">

            <!-- Colonne de Gauche : Texte -->
            <div class="w-full lg:w-1/2">
                <h1 class="text-4xl lg:text-5xl font-normal mb-8 text-[#1a1a1a]">Charbel Coffi</h1>

                <div class="space-y-4 text-gray-700 leading-relaxed font-light text-sm lg:text-base">
                    <p>
                        Charbel Coffi est un artiste plasticien béninois né en 1985. Il est le fondateur des Ateliers Coffi, un espace d'art contemporain situé à Fidjrossè, Cotonou. Son travail utilise des matériaux naturels comme le kaolin et la latérite pour créer des textures craquelées uniques.
                    </p>
                    <p>
                        Ses thèmes de prédilection sont la réconciliation culturelle, la perte d'identité et l'écologie. À travers ses œuvres, il cherche à créer des ponts entre les cultures et à interroger notre rapport à la terre et à nos racines.
                    </p>
                    <p>
                        Il a exposé récemment à Lagos (Nigeria) pour son exposition personnelle "Rooted", et ses œuvres sont régulièrement présentées dans des expositions collectives à travers l'Afrique et l'Europe.
                    </p>
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
                <div class="bg-[#dcdcdc] w-full h-[400px] lg:h-[500px] flex items-center justify-center text-gray-400">
                    Portrait de Charbel Coffi
                </div>
            </div>
        </div>

        <!-- Section Grille d'Œuvres de l'artiste -->
        <div class="border-t border-gray-100 pt-16">
            <h2 class="text-3xl font-normal mb-10 text-[#1a1a1a]">Œuvres de Charbel Coffi</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 items-start">

                <!-- Œuvre 1 -->
                <a href="{{ route('artwork.detail') }}" class="block bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    <div class="bg-[#e67e22] h-96 flex items-center justify-center text-white/50">Image</div>
                    <div class="p-4">
                        <h3 class="font-medium text-sm">Réconciliation</h3>
                        <p class="text-sm text-gray-500 italic mt-1">Technique mixte</p>
                        <p class="text-[11px] text-gray-400 mt-3">2024</p>
                        <p class="text-[11px] text-gray-400">Kaolin et latérite</p>
                        <span class="text-xs border-b border-black pb-0.5 inline-block mt-3">En savoir plus</span>
                    </div>
                </a>

                <!-- Œuvre 2 -->
                <a href="{{ route('artwork.detail') }}" class="block bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    <div class="bg-[#2c3e50] h-80 flex items-center justify-center text-white/50">Image</div>
                    <div class="p-4">
                        <h3 class="font-medium text-sm">Rooted</h3>
                        <p class="text-sm text-gray-500 italic mt-1">Installation</p>
                        <p class="text-[11px] text-gray-400 mt-3">2025</p>
                        <p class="text-[11px] text-gray-400">Terre et fibres</p>
                        <span class="text-xs border-b border-black pb-0.5 inline-block mt-3">En savoir plus</span>
                    </div>
                </a>

                <!-- Œuvre 3 -->
                <a href="{{ route('artwork.detail') }}" class="block bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    <div class="bg-gray-300 h-[420px] flex items-center justify-center text-gray-500">Image</div>
                    <div class="p-4">
                        <h3 class="font-medium text-sm">Écologie</h3>
                        <p class="text-sm text-gray-500 italic mt-1">Technique mixte</p>
                        <p class="text-[11px] text-gray-400 mt-3">2023</p>
                        <p class="text-[11px] text-gray-400">Matériaux recyclés</p>
                        <span class="text-xs border-b border-black pb-0.5 inline-block mt-3">En savoir plus</span>
                    </div>
                </a>

                <!-- Œuvre 4 -->
                <a href="{{ route('artwork.detail') }}" class="block bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    <div class="bg-[#a0522d] h-72 flex items-center justify-center text-white/50">Image</div>
                    <div class="p-4">
                        <h3 class="font-medium text-sm">Identité</h3>
                        <p class="text-sm text-gray-500 italic mt-1">Sculpture</p>
                        <p class="text-[11px] text-gray-400 mt-3">2022</p>
                        <p class="text-[11px] text-gray-400">Terre cuite</p>
                        <span class="text-xs border-b border-black pb-0.5 inline-block mt-3">En savoir plus</span>
                    </div>
                </a>

            </div>
        </div>
    </section>
@endsection
