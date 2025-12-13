<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::with('category')->latest()->paginate(10);
        return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.photos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required|image',
        ]);

        $file = $request->file('image')->store('photos', 'public');

        Photo::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'image' => $file,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.photos.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function edit(Photo $photo)
    {
        $categories = Category::all();
        return view('admin.photos.edit', compact('photo', 'categories'));
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
        ]);

        $data = $request->only(['title', 'category_id', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('photos', 'public');
        }

        $photo->update($data);

        return redirect()->route('admin.photos.index')->with('success', 'Foto berhasil diupdate!');
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        return back()->with('success', 'Foto berhasil dihapus!');
    }
}
