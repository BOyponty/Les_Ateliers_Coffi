@extends('layouts.app')

@section('content')
    <article class="container mx-auto px-4 py-16 max-w-4xl">

        <!-- En-tête de l'article -->
        <header class="text-center mb-12">
            <h1 class="text-2xl md:text-3xl font-medium mb-4 text-[#1a1a1a]">{{ $news->title }}</h1>
            <p class="text-sm text-gray-500 flex items-center justify-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ $news->published_at ? $news->published_at->format('d F Y') : $news->created_at->format('d F Y') }}
            </p>
        </header>

        <!-- Contenu -->
        <div class="space-y-6 text-gray-800 leading-relaxed font-light text-[15px] md:text-base">

            <!-- Chapeau -->
            <p class="text-xl md:text-2xl text-gray-900 font-light mb-8 leading-snug">
                {{ Str::limit($news->content, 150) }}
            </p>

            <!-- Corps de l'article -->
            <div class="prose max-w-none text-gray-700">
                {!! nl2br(e($news->content)) !!}
            </div>

            <!-- Image 1 (Image principale) -->
            @if($news->image)
                <div class="my-10">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-auto">
                    <p class="text-center text-sm text-gray-500 mt-4">Vue de l'exposition aux Ateliers Coffi.</p>
                </div>
            @endif

            <!-- Image 2 (Deuxième image dynamique) -->
            @if($news->image_2)
                <div class="my-10">
                    <img src="{{ asset('storage/' . $news->image_2) }}" alt="{{ $news->title }} - image 2" class="w-full h-auto">
                    <p class="text-center text-sm text-gray-500 mt-4">Performance lors du vernissage.</p>
                </div>
            @endif

            <!-- Conclusion -->
            <p>
                Restez connectés pour découvrir les prochaines actualités des Ateliers Coffi. Nous vous donnons rendez-vous très bientôt pour de nouvelles aventures artistiques !
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
                    <span class="text-xs text-gray-500 mb-1">Retour aux actualités</span>
                    <span class="text-base font-semibold text-gray-900 group-hover:underline">Toutes les nouvelles</span>
                </div>
            </a>
            <a href="{{ route('nouvelles') }}" class="flex items-center justify-end gap-4 group w-full md:w-1/2 text-right">
                <div class="flex flex-col">
                    <span class="text-xs text-gray-500 mb-1">Articles suivant</span>
                    <span class="text-base font-semibold text-gray-900 group-hover:underline">Voir plus d'articles</span>
                </div>
                <span class="text-gray-400 group-hover:translate-x-1 transition text-lg">&rarr;</span>
            </a>
        </div>

    </article>
@endsection
