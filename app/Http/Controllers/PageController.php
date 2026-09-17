<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $setting = Setting::first();

        return view('pages.show', compact('page', 'setting'));
    }
}