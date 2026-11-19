@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-3xl">
        <a href="{{ route('admin.artists.index') }}" class="text-sm text-gray-500 hover:text-black mb-4 inline-block">&larr; Retour à la liste</a>
        <h1 class="text-3xl font-serif mb-8">Ajouter un artiste</h1>

        <form action="{{ route('admin.artists.store') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-gray-100 shadow-sm p-8">
            @csrf
            @include('admin.artists._form', ['artist' => null])

            <div class="flex gap-4 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-[#1a1a1a] text-white px-8 py-3 rounded hover:bg-gray-800 transition">
                    Enregistrer
                </button>
                <a href="{{ route('admin.artists.index') }}" class="px-8 py-3 text-gray-600 hover:text-black transition">Annuler</a>
            </div>
        </form>
    </div>
@endsection
