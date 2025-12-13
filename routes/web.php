<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Memanggil Controller untuk Halaman Utama
use App\Http\Controllers\PageController; // Memanggil Controller untuk Halaman Dinamis (Profil, dll)

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini adalah peta untuk website kamu.
|
*/

// Route untuk HALAMAN UTAMA
// Ketika user mengakses http://127.0.0.1:8000/
// Laravel akan menjalankan fungsi 'index' di 'HomeController'
Route::get('/', [HomeController::class, 'index']);


// Route untuk HALAMAN DINAMIS (misal: Profil, Visi Misi)
// Contoh: http://127.0.0.1:8000/page/profil
Route::get('/page/{slug}', [PageController::class, 'show']);


// Route dari Breeze (Login, Register, Dashboard)
// JANGAN DIHAPUS, ini yang mengatur sistem loginnya
require __DIR__.'/auth.php';