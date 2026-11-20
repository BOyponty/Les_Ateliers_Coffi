<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'image_2' => 'nullable|image|max:5120', // <-- Ajouté
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . uniqid();
        $validated['published_at'] = now();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        if ($request->hasFile('image_2')) {
            $validated['image_2'] = $request->file('image_2')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'L\'actualité a bien été publiée.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'image_2' => 'nullable|image|max:5120', // <-- Ajouté
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        if ($request->hasFile('image_2')) {
            if ($news->image_2) {
                Storage::disk('public')->delete($news->image_2);
            }
            $validated['image_2'] = $request->file('image_2')->store('news', 'public');
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'L\'actualité a bien été modifiée.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        if ($news->image_2) {
            Storage::disk('public')->delete($news->image_2);
        }
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'L\'actualité a bien été supprimée.');
    }
}
