@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <div class="flex justify-between items-center mb-8">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-500 hover:text-black mb-2 inline-block">&larr; Retour au tableau de bord</a>
                <h1 class="text-3xl font-serif">Gestion des Artistes</h1>
            </div>
            <a href="{{ route('admin.artists.create') }}" class="bg-[#1a1a1a] text-white px-6 py-3 rounded hover:bg-gray-800 transition text-sm">
                + Ajouter un artiste
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
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Photo</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Spécialité</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Œuvres</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($artists as $artist)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                @if($artist->photo)
                                    <img src="{{ asset('storage/' . $artist->photo) }}" alt="{{ $artist->name }}" class="w-16 h-16 object-cover rounded-full">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center text-xs text-gray-400">N/A</div>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">{{ $artist->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $artist->specialty }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $artist->artworks->count() }}</td>
                            <td class="px-4 py-3 text-right space-x-2">
                                <a href="{{ route('admin.artists.edit', $artist) }}" class="text-sm text-blue-600 hover:underline">Modifier</a>
                                <form action="{{ route('admin.artists.destroy', $artist) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cet artiste ? Toutes ses œuvres seront également supprimées.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">Aucun artiste pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
