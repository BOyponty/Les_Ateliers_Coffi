@extends('layouts.app')

@section('content')
    <article class="container mx-auto px-4 py-16 max-w-4xl">

        <!-- En-tête de l'article -->
        <header class="text-center mb-12">
            <h1 class="text-2xl md:text-3xl font-medium mb-4 text-[#1a1a1a]">Retour sur l'exposition "Dig Where You Stand"</h1>
            <p class="text-sm text-gray-500 flex items-center justify-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                15 juillet 2024
            </p>
        </header>

        <!-- Contenu -->
        <div class="space-y-6 text-gray-800 leading-relaxed font-light text-[15px] md:text-base">

            <!-- Chapeau -->
            <p class="text-xl md:text-2xl text-gray-900 font-light mb-8 leading-snug">
                Du 15 mars au 30 juin 2024, Les Ateliers Coffi ont accueilli "Dig Where You Stand", une exposition collective majeure rassemblant plus de 20 artistes autour des thèmes de la décolonisation et de la restitution.
            </p>

            <p>
                Cet événement a été un moment fort pour la scène artistique béninoise et pour notre galerie. Nous avons eu l'honneur de présenter les œuvres de Zanele Muholi, Charbel Coffi, et de nombreux autres artistes engagés. L'exposition a attiré un public varié : collectionneurs, étudiants, curieux, et professionnels du monde de l'art.
            </p>

            <!-- Image 1 -->
            <div class="my-10">
                <div class="bg-[#dcdcdc] w-full h-[350px] flex items-center justify-center text-gray-400">
                    Vue de l'exposition "Dig Where You Stand"
                </div>
                <p class="text-center text-sm text-gray-500 mt-4">Vue de l'exposition "Dig Where You Stand" aux Ateliers Coffi, Cotonou (2024).</p>
            </div>

            <p>
                "Dig Where You Stand" explore la notion de "restitution" non seulement des objets d'art, mais aussi des histoires et des mémoires. À travers des installations, des peintures et des photographies, les artistes ont interrogé notre rapport au passé colonial et à la construction d'un avenir commun.
            </p>

            <p>
                Nous remercions chaleureusement tous les artistes, partenaires et visiteurs qui ont contribué au succès de cette exposition. Un merci particulier à Zanele Muholi pour sa confiance et son engagement.
            </p>

            <!-- Image 2 -->
            <div class="my-10">
                <div class="bg-[#dcdcdc] w-full h-[350px] flex items-center justify-center text-gray-400">
                    Performance lors du vernissage
                </div>
                <p class="text-center text-sm text-gray-500 mt-4">Performance lors du vernissage de "Dig Where You Stand".</p>
            </div>

            <p>
                L'exposition a également été l'occasion de lancer un cycle de conférences et d'ateliers ouverts au public, animés par Charbel Coffi et Mélissa Ilboudo Houadjeto. Ces rencontres ont permis d'approfondir les réflexions autour de l'art contemporain africain et de son rôle dans la société.
            </p>

            <p>
                Restez connectés pour découvrir les prochaines expositions des Ateliers Coffi. Nous vous donnons rendez-vous très bientôt pour de nouvelles aventures artistiques !
            </p>

            <div class="pt-4 space-y-1 text-gray-800 text-base">
                <p>L'équipe des Ateliers Coffi</p>
                <p>Fidjrossè, Cotonou, Bénin</p>
            </div>
        </div>

        <!-- Navigation Précédent / Suivant -->
        <div class="flex flex-col md:flex-row justify-between items-center mt-16 gap-8">
            <a href="{{ route('nouvelles') }}" class="flex items-center gap-4 group w-full md:w-1/2">
                <span class="text-gray-400 group-hover:-translate-x-1 transition text-lg">&larr;</span>
                <div class="flex flex-col">
                    <span class="text-xs text-gray-500 mb-1">Articles précédents</span>
                    <span class="text-base font-semibold text-gray-900 group-hover:underline">"Celles qui transmettent" : une exposition dédiée aux artistes plasticiennes</span>
                </div>
            </a>
            <a href="{{ route('nouvelles') }}" class="flex items-center justify-end gap-4 group w-full md:w-1/2 text-right">
                <div class="flex flex-col">
                    <span class="text-xs text-gray-500 mb-1">Articles suivant</span>
                    <span class="text-base font-semibold text-gray-900 group-hover:underline">Nouvelle résidence : bienvenue à Sika da Silveira</span>
                </div>
                <span class="text-gray-400 group-hover:translate-x-1 transition text-lg">&rarr;</span>
            </a>
        </div>

        <!-- Section Articles Similaires -->
        <div class="mt-20">
            <h3 class="text-lg font-medium mb-8 flex items-center gap-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                À lire aussi
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Article lié 1 -->
                <a href="{{ route('nouvelle.detail') }}" class="flex flex-col group">
                    <h4 class="text-base font-semibold mb-2 group-hover:underline cursor-pointer text-gray-900">Charbel Coffi expose à Lagos pour "Rooted"</h4>
                    <p class="text-sm text-gray-500 flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        2 mai 2025
                    </p>
                </a>
                <!-- Article lié 2 -->
                <a href="{{ route('nouvelle.detail') }}" class="flex flex-col group">
                    <h4 class="text-base font-semibold mb-2 group-hover:underline cursor-pointer text-gray-900">"Celles qui transmettent" : une exposition dédiée aux artistes plasticiennes</h4>
                    <p class="text-sm text-gray-500 flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        10 janvier 2026
                    </p>
                </a>
                <!-- Article lié 3 -->
                <a href="{{ route('nouvelle.detail') }}" class="flex flex-col group">
                    <h4 class="text-base font-semibold mb-2 group-hover:underline cursor-pointer text-gray-900">Ateliers ouverts : découvrez les coulisses de la création</h4>
                    <p class="text-sm text-gray-500 flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        20 mars 2024
                    </p>
                </a>
            </div>
        </div>

    </article>
@endsection
