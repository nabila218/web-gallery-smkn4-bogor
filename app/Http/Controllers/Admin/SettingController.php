<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Menampilkan halaman pengaturan.
     */
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Menyimpan pengaturan.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([

            // =============================
            // PROFIL SEKOLAH
            // =============================
            'school_name' => 'nullable|string|max:255',
            'motto' => 'nullable|string|max:255',
            'accreditation' => 'nullable|string|max:255',
            'founded_year' => 'nullable|integer|min:1900|max:2100',
            'student_count' => 'nullable|string|max:255',
            'teacher_count' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',

            // =============================
            // BANNER HOME
            // =============================
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner_title' => 'nullable|string|max:255',
            'banner_description' => 'nullable|string',

            // =============================
            // SAMBUTAN
            // =============================
            'principal_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'principal_name' => 'nullable|string|max:255',
            'principal_position' => 'nullable|string|max:255',
            'greeting' => 'nullable|string',

            // =============================
            // TENTANG SEKOLAH
            // =============================
            'school_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'about_description' => 'nullable|string',
            'school_history' => 'nullable|string',
        ]);

        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        // =============================
        // UPLOAD BANNER
        // =============================

        if ($request->hasFile('banner_image')) {

            if ($setting->banner_image) {
                Storage::disk('public')->delete($setting->banner_image);
            }

            $validated['banner_image'] =
                $request->file('banner_image')->store(
                    'settings/banner',
                    'public'
                );
        }

        // =============================
        // UPLOAD FOTO KEPALA SEKOLAH
        // =============================

        if ($request->hasFile('principal_image')) {

            if ($setting->principal_image) {
                Storage::disk('public')->delete($setting->principal_image);
            }

            $validated['principal_image'] =
                $request->file('principal_image')->store(
                    'settings/principal',
                    'public'
                );
        }

        // =============================
        // UPLOAD FOTO SEKOLAH
        // =============================

        if ($request->hasFile('school_image')) {

            if ($setting->school_image) {
                Storage::disk('public')->delete($setting->school_image);
            }

            $validated['school_image'] =
                $request->file('school_image')->store(
                    'settings/school',
                    'public'
                );
        }

        // =============================
        // SIMPAN DATA
        // =============================

        $setting->fill($validated);
        $setting->save();

        return redirect()
            ->route('admin.settings')
            ->with('success', 'Pengaturan berhasil diperbarui.');
    }
}