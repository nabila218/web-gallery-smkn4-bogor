<?php

namespace App\Http\Controllers;

use App\Models\Category;

class GalleryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['photos' => function ($query) {
            $query->latest();
        }])
        ->whereHas('photos')
        ->orderBy('name')
        ->paginate(6);

        return view('gallery.index', compact('categories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->with(['photos' => function ($query) {
                $query->latest();
            }])
            ->firstOrFail();

        return view('gallery.category', compact('category'));
    }
}