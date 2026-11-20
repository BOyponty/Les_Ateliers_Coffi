@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <div class="flex justify-between items-center mb-8">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-500 hover:text-black mb-2 inline-block">&larr; Retour au tableau de bord</a>
                <h1 class="text-3xl font-serif">Gestion des Actualités</h1>
            </div>
            <a href="{{ route('admin.news.create') }}" class="bg-[#1a1a1a] text-white px-6 py-3 rounded hover:bg-gray-800 transition text-sm">
                + Publier une actualité
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titre</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date de publication</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($news as $article)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-16 h-16 object-cover rounded">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 flex items-center justify-center text-xs text-gray-400">N/A</div>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">{{ $article->title }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">
                                {{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3 text-right space-x-2">
                                <a href="{{ route('admin.news.edit', $article) }}" class="text-sm text-blue-600 hover:underline">Modifier</a>
                                <form action="{{ route('admin.news.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cette actualité ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-gray-500">Aucune actualité pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
