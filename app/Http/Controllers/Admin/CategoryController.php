<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Menampilkan semua kategori Galeri dan Artikel.
     */
    public function index(Request $request)
    {
        $galleryCategories = Category::orderBy('id', 'asc')
            ->get()
            ->map(function ($category) {
                $category->category_type = 'Galeri';
                $category->category_source = 'gallery';

                return $category;
            });

        $articleCategories = ArticleCategory::orderBy('id', 'asc')
            ->get()
            ->map(function ($category) {
                $category->category_type = 'Artikel';
                $category->category_source = 'article';

                return $category;
            });

        $allCategories = $galleryCategories
            ->concat($articleCategories)
            ->values();

        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $allCategories
            ->slice(($currentPage - 1) * $perPage, $perPage)
            ->values();

        $categories = new LengthAwarePaginator(
            $currentItems,
            $allCategories->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Menampilkan form tambah kategori.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_type' => 'required|in:gallery,article',
        ]);

        $slug = Str::slug($validated['name']);

        if ($validated['category_type'] === 'gallery') {

            Category::create([
                'name' => $validated['name'],
                'slug' => $slug,
            ]);

        } else {

            ArticleCategory::create([
                'name' => $validated['name'],
                'slug' => $slug,
            ]);
        }

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail kategori.
     */
    public function show($category)
    {
        [$type, $id] = $this->parseCategory($category);

        if ($type === 'gallery') {
            $category = Category::findOrFail($id);
        } else {
            $category = ArticleCategory::findOrFail($id);
        }

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit($category)
    {
        [$type, $id] = $this->parseCategory($category);

        if ($type === 'gallery') {
            $category = Category::findOrFail($id);
        } else {
            $category = ArticleCategory::findOrFail($id);
        }

        $category->category_source = $type;

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Memperbarui kategori.
     */
    public function update(Request $request, $category)
    {
        [$type, $id] = $this->parseCategory($category);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($type === 'gallery') {

            $category = Category::findOrFail($id);

        } else {

            $category = ArticleCategory::findOrFail($id);
        }

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori.
     */
    public function destroy($category)
    {
        [$type, $id] = $this->parseCategory($category);

        if ($type === 'gallery') {

            $category = Category::findOrFail($id);

        } else {

            $category = ArticleCategory::findOrFail($id);
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    /**
     * Menentukan sumber kategori berdasarkan parameter route.
     */
    private function parseCategory($category)
    {
        if (str_starts_with($category, 'gallery-')) {

            return [
                'gallery',
                (int) str_replace('gallery-', '', $category),
            ];
        }

        if (str_starts_with($category, 'article-')) {

            return [
                'article',
                (int) str_replace('article-', '', $category),
            ];
        }

        /*
         * Untuk sementara tetap mendukung ID biasa
         * agar kategori Galeri lama tidak langsung rusak.
         */
        return [
            'gallery',
            (int) $category,
        ];
    }
}