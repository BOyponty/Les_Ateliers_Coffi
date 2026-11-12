@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4 py-16 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Article 1 -->
            <div class="bg-white border border-gray-100 rounded-sm p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-lg transition flex flex-col">
                <h3 class="text-xl font-medium mb-2 leading-snug text-gray-900">Retour sur l'exposition "Dig Where You Stand"</h3>
                <p class="text-sm text-gray-500 mb-6 flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    15 juillet 2024
                </p>
                <p class="text-gray-600 text-sm leading-relaxed flex-grow mb-8">
                    L'exposition collective "Dig Where You Stand" a accueilli plus de 20 artistes autour des thèmes de la décolonisation et de la restitution. Un moment fort pour les Ateliers Coffi et la scène artistique béninoise.
                </p>
                <a href="{{ route('nouvelle.detail') }}" class="text-sm text-gray-800 font-medium inline-flex items-center gap-2 border-b border-gray-400 pb-1 self-start hover:border-black hover:text-black transition">
                    Continuer la lecture
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Article 2 -->
            <div class="bg-white border border-gray-100 rounded-sm p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-lg transition flex flex-col">
                <h3 class="text-xl font-medium mb-2 leading-snug text-gray-900">Charbel Coffi expose à Lagos pour "Rooted"</h3>
                <p class="text-sm text-gray-500 mb-6 flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    2 mai 2025
                </p>
                <p class="text-gray-600 text-sm leading-relaxed flex-grow mb-8">
                    Le fondateur des Ateliers Coffi présente son exposition personnelle "Rooted" à Lagos. Une exploration de la réconciliation culturelle et de l'écologie à travers le kaolin et la latérite.
                </p>
                <a href="{{ route('nouvelle.detail') }}" class="text-sm text-gray-800 font-medium inline-flex items-center gap-2 border-b border-gray-400 pb-1 self-start hover:border-black hover:text-black transition">
                    Continuer la lecture
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Article 3 -->
            <div class="bg-white border border-gray-100 rounded-sm p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-lg transition flex flex-col">
                <h3 class="text-xl font-medium mb-2 leading-snug text-gray-900">"Celles qui transmettent" : une exposition dédiée aux artistes plasticiennes</h3>
                <p class="text-sm text-gray-500 mb-6 flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    10 janvier 2026
                </p>
                <p class="text-gray-600 text-sm leading-relaxed flex-grow mb-8">
                    Découvrez "Celles qui transmettent", une exposition mettant en lumière des artistes plasticiennes comme Princesse Keirath et Sika da Silveira sur le thème de la transmission et de la condition féminine.
                </p>
                <a href="{{ route('nouvelle.detail') }}" class="text-sm text-gray-800 font-medium inline-flex items-center gap-2 border-b border-gray-400 pb-1 self-start hover:border-black hover:text-black transition">
                    Continuer la lecture
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Article 4 -->
            <div class="bg-white border border-gray-100 rounded-sm p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-lg transition flex flex-col">
                <h3 class="text-xl font-medium mb-2 leading-snug text-gray-900">Ateliers ouverts : découvrez les coulisses de la création</h3>
                <p class="text-sm text-gray-500 mb-6 flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    20 mars 2024
                </p>
                <p class="text-gray-600 text-sm leading-relaxed flex-grow mb-8">
                    Les Ateliers Coffi ouvrent leurs portes au public. Venez rencontrer les artistes en résidence et découvrir le processus de création dans notre atelier-jardin à Fidjrossè.
                </p>
                <a href="{{ route('nouvelle.detail') }}" class="text-sm text-gray-800 font-medium inline-flex items-center gap-2 border-b border-gray-400 pb-1 self-start hover:border-black hover:text-black transition">
                    Continuer la lecture
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Article 5 -->
            <div class="bg-white border border-gray-100 rounded-sm p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-lg transition flex flex-col">
                <h3 class="text-xl font-medium mb-2 leading-snug text-gray-900">L'Art nous unit, le Bénin brille !</h3>
                <p class="text-sm text-gray-500 mb-6 flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    1 septembre 2025
                </p>
                <p class="text-gray-600 text-sm leading-relaxed flex-grow mb-8">
                    Retour en images sur l'événement "L'Art nous unit, le Bénin brille !", qui a fusionné mode et peinture avec le designer Jamal Chleuh et les artistes résidents.
                </p>
                <a href="{{ route('nouvelle.detail') }}" class="text-sm text-gray-800 font-medium inline-flex items-center gap-2 border-b border-gray-400 pb-1 self-start hover:border-black hover:text-black transition">
                    Continuer la lecture
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Article 6 -->
            <div class="bg-white border border-gray-100 rounded-sm p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-lg transition flex flex-col">
                <h3 class="text-xl font-medium mb-2 leading-snug text-gray-900">Nouvelle résidence : bienvenue à Sika da Silveira</h3>
                <p class="text-sm text-gray-500 mb-6 flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    5 février 2025
                </p>
                <p class="text-gray-600 text-sm leading-relaxed flex-grow mb-8">
                    Nous avons le plaisir d'accueillir l'artiste peintre Sika da Silveira en résidence aux Ateliers Coffi pour une durée de trois mois. Venez découvrir son travail en cours.
                </p>
                <a href="{{ route('nouvelle.detail') }}" class="text-sm text-gray-800 font-medium inline-flex items-center gap-2 border-b border-gray-400 pb-1 self-start hover:border-black hover:text-black transition">
                    Continuer la lecture
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

        </div>
    </section>
@endsection
