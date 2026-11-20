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
        <label class="block text-sm font-medium text-gray-700 mb-2">Titre de l'actualité *</label>
        <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}" required
               class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Contenu *</label>
        <textarea name="content" rows="10" required class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">{{ old('content', $news->content ?? '') }}</textarea>
    </div>

    <!-- Image 1 -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Image principale (5 Mo max)</label>
        @if(isset($news) && $news->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $news->image) }}" class="w-32 h-32 object-cover rounded border">
                <p class="text-xs text-gray-500 mt-1">Image actuelle</p>
            </div>
        @endif
        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>

    <!-- Image 2 (Nouveau) -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Deuxième image (5 Mo max)</label>
        @if(isset($news) && $news->image_2)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $news->image_2) }}" class="w-32 h-32 object-cover rounded border">
                <p class="text-xs text-gray-500 mt-1">Image actuelle</p>
            </div>
        @endif
        <input type="file" name="image_2" accept="image/*" class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:border-black">
    </div>
</div>
