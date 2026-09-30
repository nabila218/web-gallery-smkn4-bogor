<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = ArticleCategory::orderBy('name', 'asc')->get();

        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:article_categories,id',
            'status' => 'required|in:draft,publish',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $article = new Article();

        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->status = $request->status;

        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('article', 'public');
        }

        $article->save();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(Article $article)
    {
        $article->load('category');

        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = ArticleCategory::orderBy('name', 'asc')->get();

        return view('admin.articles.edit', compact(
            'article',
            'categories'
        ));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:article_categories,id',
            'status' => 'required|in:draft,publish',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->status = $request->status;

        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('article', 'public');
        }

        $article->save();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}