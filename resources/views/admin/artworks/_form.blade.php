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
    <!-- Titre -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Titre de l'œuvre *</label>
        <input type="text" name="title" value="{{ old('title', $artwork->title ?? '') }}" required
               class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>

    <!-- Artiste -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Artiste *</label>
        <select name="artist_id" required class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
            <option value="">-- Choisir un artiste --</option>
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}" {{ old('artist_id', $artwork->artist_id ?? '') == $artist->id ? 'selected' : '' }}>
                    {{ $artist->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <!-- Technique -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Technique</label>
            <input type="text" name="technique" value="{{ old('technique', $artwork->technique ?? '') }}"
                   class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
        </div>
        <!-- Dimensions -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Dimensions</label>
            <input type="text" name="dimensions" value="{{ old('dimensions', $artwork->dimensions ?? '') }}"
                   class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <!-- Année -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Année</label>
            <input type="text" name="year" value="{{ old('year', $artwork->year ?? '') }}"
                   class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
        </div>
        <!-- Prix -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Prix (FCFA)</label>
            <input type="number" name="price" value="{{ old('price', $artwork->price ?? '') }}" placeholder="Vide = sur demande"
                   class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
        </div>
        <!-- Statut -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Statut *</label>
            <select name="status" required class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
                <option value="disponible" {{ old('status', $artwork->status ?? '') === 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="vendu" {{ old('status', $artwork->status ?? '') === 'vendu' ? 'selected' : '' }}>Vendu</option>
                <option value="exposé" {{ old('status', $artwork->status ?? '') === 'exposé' ? 'selected' : '' }}>Exposé</option>
            </select>
        </div>
    </div>

    <!-- Description -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea name="description" rows="4" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">{{ old('description', $artwork->description ?? '') }}</textarea>
    </div>

    <!-- Image -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Image (5 Mo max)</label>
        @if(isset($artwork) && $artwork->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $artwork->image) }}" class="w-32 h-32 object-cover rounded border">
                <p class="text-xs text-gray-500 mt-1">Image actuelle</p>
            </div>
        @endif
        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>
</div>
