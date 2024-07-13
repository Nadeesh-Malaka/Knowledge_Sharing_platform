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

    public function update(Request $request, Chat $chat)
    {
        $request->validate([
            'message' => 'required',
        ]);

        if ($chat->user_id != Auth::id()) {
            return back()->with('error', 'You are not authorized to edit this message.');
        }

        $chat->update([
            'message' => $request->message,
        ]);

        return back()->with('status', 'Message updated successfully');
    }

    public function destroy(Chat $chat)
    {
        if ($chat->user_id != Auth::id()) {
            return back()->with('error', 'You are not authorized to delete this message.');
        }

        $chat->delete();

        return back()->with('status', 'Message deleted successfully');
    }
}
