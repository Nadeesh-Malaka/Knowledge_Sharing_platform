<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests; // Ensure this is included

    public function show()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('profiles', 'public');
            if ($user->profile_photo && $user->profile_photo !== 'assets/img/user-icon.png') {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $user->profile_photo = $photoPath;
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('myProfile')->with('status', 'Profile updated successfully.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Account deleted successfully!');
    }

    public function updatepost(Request $request, Post $post)
    {
        $data = $request->only('content');
        // if ($request->hasFile('post_image')) {
        //     // Delete old image if exists
        //     if ($post->post_image) {
        //         Storage::delete($post->post_image);
        //     }

        //     $data['post_image'] = $request->file('post_image')->store('post_images');
        // }

        $post->update($data);

        return response()->json(['success' => 'Post updated successfully.', 'post_image' => $post->post_image]);
    }

    public function destroypost(Post $post)
    {
        // Delete post image if exists
        if ($post->post_image) {
            Storage::delete($post->post_image);
        }

        $post->delete();

        return redirect()->back()->with('status', 'Post deleted successfully.');
    }


    public function updateComment(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);
    
        $comment->update($validated);
    
        return response()->json(['success' => true]);
    }


    public function destroyComment(Comment $comment)
    {

        $comment->delete();

        return Redirect::route('myProfile')->with('status', 'Comment deleted successfully.');
    }

    public function destroyFeedback(Contact $contact)
    {
        $contact->delete();

        return Redirect::route('myProfile')->with('status', 'Feedback deleted successfully.');
    }


}
