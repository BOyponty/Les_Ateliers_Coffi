@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-3xl">
        <a href="{{ route('admin.contacts.index') }}" class="text-sm text-gray-500 hover:text-black mb-4 inline-block">&larr; Retour à la liste</a>

        <div class="flex justify-between items-start mb-8">
            <h1 class="text-3xl font-serif">Demande de contact</h1>
            <span class="px-3 py-1 text-sm rounded-full
                {{ $contact->status === 'nouveau' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                {{ ucfirst($contact->status) }}
            </span>
        </div>

        <div class="bg-white border border-gray-100 shadow-sm p-8 space-y-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Nom complet</p>
                    <p class="text-lg">{{ $contact->first_name }} {{ $contact->last_name }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Date</p>
                    <p class="text-lg">{{ $contact->created_at->format('d F Y à H:i') }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Email</p>
                    <p class="text-lg"><a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:underline">{{ $contact->email }}</a></p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Téléphone</p>
                    <p class="text-lg">{{ $contact->phone ?? 'Non renseigné' }}</p>
                </div>
            </div>

            @if($contact->artwork)
                <div class="border-t border-gray-100 pt-6">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Œuvre concernée</p>
                    <p class="text-lg font-medium">{{ $contact->artwork->title }}</p>
                    <a href="{{ route('artwork.detail', $contact->artwork->slug) }}" target="_blank" class="text-sm text-blue-600 hover:underline">Voir l'œuvre sur le site public &rarr;</a>
                </div>
            @endif

            <div class="border-t border-gray-100 pt-6">
                <p class="text-xs text-gray-500 uppercase tracking-wide mb-3">Message</p>
                <div class="bg-gray-50 p-6 text-gray-700 leading-relaxed">
                    {{ $contact->message }}
                </div>
            </div>

            <div class="border-t border-gray-100 pt-6 flex gap-4">
                <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{ $contact->status === 'nouveau' ? 'traité' : 'nouveau' }}">
                    <button type="submit" class="bg-[#1a1a1a] text-white px-6 py-2 rounded hover:bg-gray-800 transition text-sm">
                        Marquer comme {{ $contact->status === 'nouveau' ? 'traité' : 'nouveau' }}
                    </button>
                </form>
                <a href="{{ route('admin.contacts.index') }}" class="px-6 py-2 text-gray-600 hover:text-black transition text-sm">Retour</a>
            </div>
        </div>
    </div>
@endsection
