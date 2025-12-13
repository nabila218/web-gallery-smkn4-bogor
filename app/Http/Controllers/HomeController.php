<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo; // Menghubungkan ke Model Photo
use App\Models\Page;  // Menghubungkan ke Model Page

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama aplikasi (Web Gallery).
     */
    public function index()
    {
        // Ambil 8 foto terbaru dari database, diurutkan dari yang terbaru
        // paginate(8) artinya batasi 8 foto per halaman
        $photos = Photo::latest()->paginate(8);

        // Ambil SEMUA data halaman statis (Profil, Visi Misi, dll)
        $pages = Page::all();

        // Kirim data $photos dan $pages ke view 'home'
        // 'compact' adalah cara singkat untuk membuat ['photos' => $photos, 'pages' => $pages]
        return view('home', compact('photos', 'pages'));
    }
}