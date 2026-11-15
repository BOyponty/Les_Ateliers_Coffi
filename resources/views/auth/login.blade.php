@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)]">
            <div>
                <h2 class="mt-6 text-center text-3xl font-serif text-gray-900">
                    Espace Administration
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Accès réservé aux Ateliers Coffi
                </p>
            </div>

            <!-- Affichage des erreurs -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4">
                    <p class="text-sm text-red-700">{{ $errors->first() }}</p>
                </div>
            @endif

            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" required
                               class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-black focus:border-black focus:z-10 sm:text-sm"
                               placeholder="Adresse email">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input id="password" name="password" type="password" required
                               class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-black focus:border-black focus:z-10 sm:text-sm"
                               placeholder="Mot de passe">
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#1a1a1a] hover:bg-gray-800 focus:outline-none transition">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
