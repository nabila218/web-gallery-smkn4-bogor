<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProfileController;


/*
|--------------------------------------------------------------------------
| FRONTEND (PUBLIC)
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Halaman statis
Route::get('/page/{slug}', [PageController::class, 'show'])
    ->name('page.show');

Route::get('/program/{slug}', [ProgramController::class, 'show'])
    ->name('program.show');

Route::get('/artikel', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/artikel/{slug}', [ArticleController::class, 'show'])
    ->name('articles.show');

Route::get('/galeri', [GalleryController::class, 'index'])
    ->name('gallery.index');

Route::get('/galeri/{slug}', [GalleryController::class, 'category'])
    ->name('gallery.category');
/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

// Laravel Breeze
require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
|
| auth  = wajib login
| admin = hanya administrator
|
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | ARTIKEL
        |--------------------------------------------------------------------------
        */

        Route::resource('articles', AdminArticleController::class);


        /*
        |--------------------------------------------------------------------------
        | GALERI / FOTO
        |--------------------------------------------------------------------------
        */

        Route::resource('photos', PhotoController::class);


        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        Route::resource('categories', CategoryController::class);


        /*
        |--------------------------------------------------------------------------
        | KONTAK
        |--------------------------------------------------------------------------
        */

        Route::get('/contacts', [ContactController::class, 'index'])
            ->name('contacts.index');

        Route::get('/contacts/edit', [ContactController::class, 'edit'])
            ->name('contacts.edit');

        Route::put('/contacts', [ContactController::class, 'update'])
            ->name('contacts.update');


        /*
        |--------------------------------------------------------------------------
        | PENGATURAN
        |--------------------------------------------------------------------------
        */

        Route::get('/settings', [SettingController::class, 'index'])
            ->name('settings');

        Route::put('/settings', [SettingController::class, 'update'])
            ->name('settings.update');


        /*
        |--------------------------------------------------------------------------
        | MANAJEMEN ADMIN
        |--------------------------------------------------------------------------
        */

        Route::resource('admins', AdminUserController::class)
            ->except([
                'show',
                'edit',
                'update'
            ]);


        /*
        |--------------------------------------------------------------------------
        | PROFILE ADMINISTRATOR
        |--------------------------------------------------------------------------
        |
        | GET  /admin/profile       -> halaman profil
        | GET  /admin/profile/edit  -> halaman edit profil
        | PUT  /admin/profile       -> simpan perubahan profil
        |
        */

        Route::get('/profile', [ProfileController::class, 'index'])
            ->name('profile');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::put('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

    });