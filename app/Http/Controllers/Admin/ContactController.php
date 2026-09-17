<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan data kontak.
     */
    public function index()
    {
        $contact = Contact::first();

        return view('admin.contacts.index', compact('contact'));
    }


    /**
     * Form edit kontak.
     */
    public function edit()
    {
        $contact = Contact::first();

        return view('admin.contacts.edit', compact('contact'));
    }


    /**
     * Menyimpan perubahan kontak.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'google_maps' => 'nullable|string',

            'operational_days' => 'nullable|string|max:255',
            'opening_time' => 'nullable|string|max:255',
            'closing_time' => 'nullable|string|max:255',

            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
        ]);

        $contact = Contact::first();

        if ($contact) {
            $contact->update($validated);
        } else {
            Contact::create($validated);
        }

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Kontak berhasil diperbarui.');
    }
}