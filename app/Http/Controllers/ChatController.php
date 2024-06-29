<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat()
    {
        $chats = Chat::with('user')->latest()->get();
        return view('user.chat', compact('chats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        Chat::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back()->with('status', 'Message sent successfully');
    }
}
