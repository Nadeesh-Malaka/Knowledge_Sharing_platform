<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('user.que');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        $post = new Post;
        $post->user_id = Auth::id();
        $post->content = $request->content;
        $post->is_approved = false; // Default is not approved

        if ($request->hasFile('post_image')) {
            $imagePath = $request->file('post_image')->store('posts', 'public');
            $post->post_image = $imagePath;
        }

        $post->save();

        return Redirect::route('que')->with('status', 'Post submitted for approval');
    }

    public function toggleLike(Post $post)
    {
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)
                    ->where('post_id', $post->id)
                    ->first();

        if ($like) {
            // User has already liked, so unlike
            $like->delete();
            return back()->with('status', 'Post unliked successfully.');
        } else {
            // User has not liked, so like
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
            return back()->with('status', 'Post liked successfully.');
        }

    }

    public function share(Request $request, Post $post)
    {
        // Generate the shareable link
        $shareableLink = route('post.show', $post->id);

        // Example: Record the share event (optional)
        // $post->shares()->create(['user_id' => auth()->id()]);

        // You can redirect the user with a message or perform other actions
        return redirect()->back()->with('message', 'Post link: ' . $shareableLink);
    }

     


}
