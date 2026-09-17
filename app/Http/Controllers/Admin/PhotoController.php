<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Menampilkan semua galeri
     */
    public function index()
    {
        $photos = Photo::with('category')
            ->latest()
            ->paginate(6);

        return view('admin.photos.index', compact('photos'));
    }

    /**
     * Form tambah galeri
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.photos.create', compact('categories'));
    }

    /**
     * Menyimpan galeri baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('photos', 'public');
        }

        $validated['user_id'] = auth()->id();

        Photo::create($validated);

        return redirect()
            ->route('admin.photos.index')
            ->with('success', 'Galeri berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail galeri
     */
    public function show(Photo $photo)
    {
        $photo->load('category');

        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Form edit galeri
     */
    public function edit(Photo $photo)
    {
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.photos.edit',
            compact('photo', 'categories')
        );
    }

    /**
     * Memperbarui galeri
     */
    public function update(Request $request, Photo $photo)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($photo->image) {
                Storage::disk('public')->delete($photo->image);
            }

            $validated['image'] = $request->file('image')
                ->store('photos', 'public');
        }

        $photo->update($validated);

        return redirect()
            ->route('admin.photos.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    /**
     * Menghapus galeri
     */
    public function destroy(Photo $photo)
    {
        if ($photo->image) {
            Storage::disk('public')->delete($photo->image);
        }

        $photo->delete();

        return redirect()
            ->route('admin.photos.index')
            ->with('success', 'Galeri berhasil dihapus.');
    }
}