<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::with('artist')->latest()->get();
        return view('admin.artworks.index', compact('artworks'));
    }

    public function create()
    {
        $artists = Artist::orderBy('name')->get();
        return view('admin.artworks.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'description' => 'nullable|string',
            'technique' => 'nullable|string|max:255',
            'dimensions' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:10',
            'price' => 'nullable|numeric|min:0',
            'status' => 'required|in:disponible,vendu,exposé',
            'image' => 'nullable|image|max:5120',
            'image_2' => 'nullable|image|max:5120', // <-- Ajouté
            'image_3' => 'nullable|image|max:5120', // <-- Ajouté
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . uniqid();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('artworks', 'public');
        }
        if ($request->hasFile('image_2')) {
            $validated['image_2'] = $request->file('image_2')->store('artworks', 'public');
        }
        if ($request->hasFile('image_3')) {
            $validated['image_3'] = $request->file('image_3')->store('artworks', 'public');
        }

        Artwork::create($validated);

        return redirect()->route('admin.artworks.index')
            ->with('success', 'L\'œuvre a bien été ajoutée.');
    }

    public function edit(Artwork $artwork)
    {
        $artists = Artist::orderBy('name')->get();
        return view('admin.artworks.edit', compact('artwork', 'artists'));
    }

    public function update(Request $request, Artwork $artwork)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'description' => 'nullable|string',
            'technique' => 'nullable|string|max:255',
            'dimensions' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:10',
            'price' => 'nullable|numeric|min:0',
            'status' => 'required|in:disponible,vendu,exposé',
            'image' => 'nullable|image|max:5120',
            'image_2' => 'nullable|image|max:5120', // <-- Ajouté
            'image_3' => 'nullable|image|max:5120', // <-- Ajouté
        ]);

        if ($request->hasFile('image')) {
            if ($artwork->image) Storage::disk('public')->delete($artwork->image);
            $validated['image'] = $request->file('image')->store('artworks', 'public');
        }
        if ($request->hasFile('image_2')) {
            if ($artwork->image_2) Storage::disk('public')->delete($artwork->image_2);
            $validated['image_2'] = $request->file('image_2')->store('artworks', 'public');
        }
        if ($request->hasFile('image_3')) {
            if ($artwork->image_3) Storage::disk('public')->delete($artwork->image_3);
            $validated['image_3'] = $request->file('image_3')->store('artworks', 'public');
        }

        $artwork->update($validated);

        return redirect()->route('admin.artworks.index')
            ->with('success', 'L\'œuvre a bien été modifiée.');
    }

    public function destroy(Artwork $artwork)
    {
        if ($artwork->image) Storage::disk('public')->delete($artwork->image);
        if ($artwork->image_2) Storage::disk('public')->delete($artwork->image_2);
        if ($artwork->image_3) Storage::disk('public')->delete($artwork->image_3);
        $artwork->delete();

        return redirect()->route('admin.artworks.index')
            ->with('success', 'L\'œuvre a bien été supprimée.');
    }
}
