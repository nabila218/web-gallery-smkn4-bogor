<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categories = ArticleCategory::orderBy('name')->get();

        $articles = Article::with('category')
            ->whereRaw('LOWER(status) = ?', ['publish'])
            ->when($request->category, function ($query, $category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('slug', $category);
                });
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('articles.index', compact(
            'articles',
            'categories'
        ));
    }

    public function show($slug)
{
    $article = Article::with('category')
        ->where('slug', $slug)
        ->firstOrFail();

    $categories = ArticleCategory::orderBy('name')->get();

    $latestArticles = Article::with('category')
        ->whereRaw('LOWER(status) = ?', ['publish'])
        ->where('id', '!=', $article->id)
        ->latest()
        ->take(4)
        ->get();

    return view('articles.show', compact(
        'article',
        'categories',
        'latestArticles'
    ));
}
}