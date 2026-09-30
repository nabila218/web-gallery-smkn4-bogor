<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
{
    Message::whereNull('read_at')->update([
        'read_at' => now(),
    ]);

    $messages = Message::latest()->get();

    return view('admin.messages.index', compact('messages'));
}

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}