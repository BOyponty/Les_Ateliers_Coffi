@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4 py-16 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @for ($i = 0; $i < 6; $i++)
                @php
                    $article = $news[$i % $news->count()];
                @endphp
                <div class="bg-white border border-gray-100 rounded-sm p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-lg transition flex flex-col">
                    <h3 class="text-xl font-medium mb-2 leading-snug text-gray-900">{{ $article->title }}</h3>
                    <p class="text-sm text-gray-500 mb-6 flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $article->published_at ? $article->published_at->format('d F Y') : $article->created_at->format('d F Y') }}
                    </p>
                    <p class="text-gray-600 text-sm leading-relaxed flex-grow mb-8">
                        {{ Str::limit($article->content, 180) }}
                    </p>
                    <a href="{{ route('nouvelle.detail', $article->slug) }}" class="text-sm text-gray-800 font-medium inline-flex items-center gap-2 border-b border-gray-400 pb-1 self-start hover:border-black hover:text-black transition">
                        Continuer la lecture
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            @endfor

        </div>
    </section>
@endsection
