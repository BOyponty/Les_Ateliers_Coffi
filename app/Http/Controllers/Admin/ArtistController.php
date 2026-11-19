<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::latest()->get();
        return view('admin.artists.index', compact('artists'));
    }

    public function create()
    {
        return view('admin.artists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'biography' => 'nullable|string',
            'photo' => 'nullable|image|max:5120',
        ]);

        $validated['slug'] = Str::slug($request->name) . '-' . uniqid();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('artists', 'public');
        }

        Artist::create($validated);

        return redirect()->route('admin.artists.index')
            ->with('success', 'L\'artiste a bien été ajouté.');
    }

    public function edit(Artist $artist)
    {
        return view('admin.artists.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'biography' => 'nullable|string',
            'photo' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('photo')) {
            if ($artist->photo) {
                Storage::disk('public')->delete($artist->photo);
            }
            $validated['photo'] = $request->file('photo')->store('artists', 'public');
        }

        $artist->update($validated);

        return redirect()->route('admin.artists.index')
            ->with('success', 'L\'artiste a bien été modifié.');
    }

    public function destroy(Artist $artist)
    {
        if ($artist->photo) {
            Storage::disk('public')->delete($artist->photo);
        }
        $artist->delete();

        return redirect()->route('admin.artists.index')
            ->with('success', 'L\'artiste a bien été supprimé.');
    }
}
