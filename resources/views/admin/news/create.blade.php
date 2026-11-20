
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-3xl">
        <a href="{{ route('admin.news.index') }}" class="text-sm text-gray-500 hover:text-black mb-4 inline-block">&larr; Retour à la liste</a>
        <h1 class="text-3xl font-serif mb-8">Publier une actualité</h1>

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-gray-100 shadow-sm p-8">
            @csrf
            @include('admin.news._form', ['news' => null])

            <div class="flex gap-4 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-[#1a1a1a] text-white px-8 py-3 rounded hover:bg-gray-800 transition">
                    Publier
                </button>
                <a href="{{ route('admin.news.index') }}" class="px-8 py-3 text-gray-600 hover:text-black transition">Annuler</a>
            </div>
        </form>
    </div>
@endsection
