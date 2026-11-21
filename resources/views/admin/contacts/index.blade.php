@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <div class="flex justify-between items-center mb-8">
            <div>
                <a href="{{ route('admin.dashboard') }}"
                    class="text-sm text-gray-500 hover:text-black mb-2 inline-block">&larr; Retour au tableau de bord</a>
                <h1 class="text-3xl font-serif">Demandes de Contact</h1>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Œuvre concernée</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($requests as $contact)
                        <tr class="hover:bg-gray-50 transition {{ $contact->status === 'nouveau' ? 'font-medium' : '' }}">
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $contact->created_at->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-sm">{{ $contact->first_name }} {{ $contact->last_name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $contact->email }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">
                                @if ($contact->artwork)
                                    {{ $contact->artwork->title }}
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <span
                                    class="px-2 py-1 text-xs rounded-full
                                    {{ $contact->status === 'nouveau' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($contact->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right space-x-2">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                    class="text-sm text-blue-600 hover:underline">Voir</a>
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Supprimer cette demande ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">Aucune demande de contact pour le
                                moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
