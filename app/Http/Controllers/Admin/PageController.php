<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', [
            'pages' => Page::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        Page::create([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'content' => $request->content,
        ]);

        return back()->with('success', 'Halaman berhasil ditambahkan');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('success', 'Halaman berhasil dihapus');
    }
}
