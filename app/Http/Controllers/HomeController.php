<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Article;
use App\Models\Category;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        $setting = Setting::first();

        $articles = Article::with('category')
            ->whereRaw('LOWER(status) = ?', ['publish'])
            ->latest()
            ->take(3)
            ->get();

        $galleryCategories = Category::with(['photos' => function ($query) {
            $query->latest();
        }])
        ->whereHas('photos')
        ->orderBy('name')
        ->get();

        return view('home', compact(
            'contact',
            'articles',
            'galleryCategories',
            'setting'
        ));
    }
}