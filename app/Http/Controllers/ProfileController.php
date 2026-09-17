<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan profil administrator
     */
    public function index()
    {
        return view('admin.profile.index');
    }


    /**
     * Menampilkan form edit profil
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }


    /**
     * Menyimpan perubahan profil
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            // Hapus foto lama
            if ($user->profile_photo) {

                Storage::disk('public')
                    ->delete($user->profile_photo);

            }


            // Simpan foto baru
            $validated['profile_photo'] =
                $request->file('profile_photo')
                    ->store('profile', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE USER
        |--------------------------------------------------------------------------
        */

        $user->update($validated);


        return redirect()
            ->route('admin.profile')
            ->with(
                'success',
                'Profil berhasil diperbarui.'
            );
    }
}