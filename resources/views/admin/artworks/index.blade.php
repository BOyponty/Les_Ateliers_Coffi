@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <div class="flex justify-between items-center mb-8">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-500 hover:text-black mb-2 inline-block">&larr; Retour au tableau de bord</a>
                <h1 class="text-3xl font-serif">Gestion des Œuvres</h1>
            </div>
            <a href="{{ route('admin.artworks.create') }}" class="bg-[#1a1a1a] text-white px-6 py-3 rounded hover:bg-gray-800 transition text-sm">
                + Ajouter une œuvre
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
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Artiste</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Année</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($artworks as $artwork)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                @if($artwork->image)
                                    <img src="{{ asset('storage/' . $artwork->image) }}" alt="{{ $artwork->title }}" class="w-16 h-16 object-cover rounded">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 flex items-center justify-center text-xs text-gray-400">N/A</div>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">{{ $artwork->title }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $artwork->artist->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $artwork->year }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs rounded-full
                                    {{ $artwork->status === 'disponible' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $artwork->status === 'vendu' ? 'bg-red-100 text-red-800' : '' }}
                                    {{ $artwork->status === 'exposé' ? 'bg-blue-100 text-blue-800' : '' }}">
                                    {{ ucfirst($artwork->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">
                                {{ $artwork->price ? number_format($artwork->price, 0, ',', ' ') . ' FCFA' : 'Sur demande' }}
                            </td>
                            <td class="px-4 py-3 text-right space-x-2">
                                <a href="{{ route('admin.artworks.edit', $artwork) }}" class="text-sm text-blue-600 hover:underline">Modifier</a>
                                <form action="{{ route('admin.artworks.destroy', $artwork) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cette œuvre ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">Aucune œuvre pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
