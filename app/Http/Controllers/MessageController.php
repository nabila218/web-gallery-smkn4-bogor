<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'message' => $validated['message'],
            'read_at' => null,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}