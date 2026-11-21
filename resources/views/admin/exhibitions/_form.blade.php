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
        <label class="block text-sm font-medium text-gray-700 mb-2">Titre de l'exposition *</label>
        <input type="text" name="title" value="{{ old('title', $exhibition->title ?? '') }}" required
               class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>

    <!-- Statut (Nouveau) -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Statut *</label>
        <select name="status" required class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
            <option value="à venir" {{ old('status', $exhibition->status ?? '') === 'à venir' ? 'selected' : '' }}>À venir</option>
            <option value="en cours" {{ old('status', $exhibition->status ?? '') === 'en cours' ? 'selected' : '' }}>En cours</option>
            <option value="passée" {{ old('status', $exhibition->status ?? '') === 'passée' ? 'selected' : '' }}>Passée</option>
        </select>
    </div>

    <!-- Dates -->
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Date de début</label>
            <input type="text" name="start_date" value="{{ old('start_date', $exhibition->start_date ?? '') }}" placeholder="Ex: 15.03.2024"
                   class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Date de fin</label>
            <input type="text" name="end_date" value="{{ old('end_date', $exhibition->end_date ?? '') }}" placeholder="Ex: 30.06.2024"
                   class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
        </div>
    </div>

    <!-- Description -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea name="description" rows="5" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">{{ old('description', $exhibition->description ?? '') }}</textarea>
    </div>

    <!-- Image 1 -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Image principale (5 Mo max)</label>
        @if(isset($exhibition) && $exhibition->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $exhibition->image) }}" class="w-32 h-32 object-cover rounded border">
                <p class="text-xs text-gray-500 mt-1">Image actuelle</p>
            </div>
        @endif
        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>

    <!-- Image 2 -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Deuxième image (5 Mo max)</label>
        @if(isset($exhibition) && $exhibition->image_2)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $exhibition->image_2) }}" class="w-32 h-32 object-cover rounded border">
                <p class="text-xs text-gray-500 mt-1">Image actuelle</p>
            </div>
        @endif
        <input type="file" name="image_2" accept="image/*" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>
</div>
