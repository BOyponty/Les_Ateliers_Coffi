@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <div class="flex justify-between items-center mb-8">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-500 hover:text-black mb-2 inline-block">&larr; Retour au tableau de bord</a>
                <h1 class="text-3xl font-serif">Abonnés à la Newsletter</h1>
            </div>
        </div>

        <div class="bg-white border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date d'inscription</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($subscribers as $subscriber)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-sm font-medium">{{ $subscriber->email }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $subscriber->created_at->format('d/m/Y à H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-8 text-center text-gray-500">Aucun abonné pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
