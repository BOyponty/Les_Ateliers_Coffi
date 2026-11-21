<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ExhibitionController extends Controller
{
    public function index()
    {
        $exhibitions = Exhibition::latest()->get();
        return view('admin.exhibitions.index', compact('exhibitions'));
    }

    public function create()
    {
        return view('admin.exhibitions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|string|max:255',
            'end_date' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:5120',
            'image_2' => 'nullable|image|max:5120', // <-- Ajouté
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . uniqid();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('exhibitions', 'public');
        }

        if ($request->hasFile('image_2')) {
            $validated['image_2'] = $request->file('image_2')->store('exhibitions', 'public');
        }

        Exhibition::create($validated);

        return redirect()->route('admin.exhibitions.index')
            ->with('success', 'L\'exposition a bien été ajoutée.');
    }

    public function edit(Exhibition $exhibition)
    {
        return view('admin.exhibitions.edit', compact('exhibition'));
    }

    public function update(Request $request, Exhibition $exhibition)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|string|max:255',
            'end_date' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:5120',
            'image_2' => 'nullable|image|max:5120', // <-- Ajouté
        ]);

        if ($request->hasFile('image')) {
            if ($exhibition->image) {
                Storage::disk('public')->delete($exhibition->image);
            }
            $validated['image'] = $request->file('image')->store('exhibitions', 'public');
        }

        if ($request->hasFile('image_2')) {
            if ($exhibition->image_2) {
                Storage::disk('public')->delete($exhibition->image_2);
            }
            $validated['image_2'] = $request->file('image_2')->store('exhibitions', 'public');
        }

        $exhibition->update($validated);

        return redirect()->route('admin.exhibitions.index')
            ->with('success', 'L\'exposition a bien été modifiée.');
    }

    public function destroy(Exhibition $exhibition)
    {
        if ($exhibition->image) {
            Storage::disk('public')->delete($exhibition->image);
        }
        if ($exhibition->image_2) {
            Storage::disk('public')->delete($exhibition->image_2);
        }
        $exhibition->delete();

        return redirect()->route('admin.exhibitions.index')
            ->with('success', 'L\'exposition a bien été supprimée.');
    }
}
