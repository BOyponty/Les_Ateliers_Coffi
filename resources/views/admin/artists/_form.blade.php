@if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Nom de l'artiste *</label>
        <input type="text" name="name" value="{{ old('name', $artist->name ?? '') }}" required
               class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Spécialité</label>
        <input type="text" name="specialty" value="{{ old('specialty', $artist->specialty ?? '') }}" placeholder="Ex: Artiste plasticien, Peintre..."
               class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Biographie</label>
        <textarea name="biography" rows="6" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">{{ old('biography', $artist->biography ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Photo (5 Mo max)</label>
        @if(isset($artist) && $artist->photo)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $artist->photo) }}" class="w-32 h-32 object-cover rounded-full border">
                <p class="text-xs text-gray-500 mt-1">Photo actuelle</p>
            </div>
        @endif
        <input type="file" name="photo" accept="image/*" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>
</div>
