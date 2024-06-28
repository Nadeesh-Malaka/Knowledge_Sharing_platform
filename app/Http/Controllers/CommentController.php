<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return back()->with('status', 'Comment added successfully');
    }
}
