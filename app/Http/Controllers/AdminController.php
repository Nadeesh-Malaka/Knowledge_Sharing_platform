<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function adminhome(Request $request)
    {
        $query = User::query();
    
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
    
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
    
        $customers = $query->get();
    
        return view('admin.user.adminhome', compact('customers'));
    }
    

    public function adduser()
    {
        return view('admin.user.add_user');
    }

    public function storeuser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'mobile' => ['required', 'string', 'max:10'],
            'age' => ['required', 'integer', 'min:1', 'max:120'],
            'country' => ['required', 'string', 'max:50'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'mobile' => $request->mobile,
            'country' => $request->country,
        ]);

        return redirect()->route('adminhome')-> with('notify_message', ['status' => 'success', 'msg' => 'User added successfully!']);
       
    }
   
    public function showedit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit_user', compact('user'));
    }

    public function edituser(Request $request, $id)
    { 
       
        $user = User::findOrFail($id);
    
        // Check if the email has been changed
        $emailRule = $request->email !== $user->email
            ? ['required', 'string', 'email', 'max:255', 'unique:users']
            : ['required', 'string', 'email', 'max:255'];
    
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => $emailRule,
            'mobile' => ['required', 'string', 'max:10'],
            'age' => ['required', 'integer', 'min:1', 'max:120'],
            'country' => ['required', 'string', 'max:50'],
        ]);
    
        // Update the user with the validated data
        $user->fill($request->only(['name', 'email','mobile', 'age', 'country']));
    
        // Check if the email has been changed and update email_verified_at accordingly
        if ($request->email !== $user->email) {
            $user->email_verified_at = null;
        }
    
        // Save the user
        $user->save();
    
        return redirect()->route('adminhome')->with('notify_message', ['status' => 'success', 'msg' => 'User edited successfully!']);
    }


    public function delete($id)
   {
        $user = User::findOrFail($id);
        $user->delete();
    
         return redirect()->route('adminhome')->with('notify_message', ['status' => 'success', 'msg' => 'User deleted successfully!']); 
   }
  
    //.....................Post section.........................................................
   
   public function viewpost(Request $request)
   {
       $query = Post::query();
   
       if ($request->filled('name')) {
           $query->whereHas('user', function ($q) use ($request) {
               $q->where('name', 'like', '%' . $request->name . '%');
           });
       }
   
       if ($request->filled('content')) {
           $query->where('content', 'like', '%' . $request->content . '%');
       }
   
       $posts = $query->get();
       
       return view('admin.post.posthome', compact('posts'));
   }
   
   public function addpost()
   {
       $users = User::all(); // Retrieve all users
       return view('admin.post.addpost', compact('users')); // Pass users to the view
   }
   
   
   public function storepost(Request $request)
   {
       $request->validate([
           'user_id' => 'required|exists:users,id',
           'content' => 'required',
           'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
   
       $post = new Post($request->only('user_id', 'content'));
   
       if ($request->hasFile('post_image')) {
           $post->post_image = $request->file('post_image')->store('post_images', 'public');
       }
   
       $post->save();
   
       return redirect()->route('viewpost')->with('notify_message', ['status' => 'success', 'msg' => 'Post added successfully!']);
   }
   
   public function deletepost($id)
   {
       $post = Post::findOrFail($id);
       if ($post->post_image) {
           Storage::disk('public')->delete($post->post_image);
       }
       $post->delete();
   
       return redirect()->route('viewpost')->with('notify_message', ['status' => 'success', 'msg' => 'Post deleted successfully!']);
   }
   
   public function markasapproved($id)
   {
       $post = Post::findOrFail($id);
       $post->is_approved = 1;
       $post->save();
   
       return redirect()->route('viewpost')->with('notify_message', ['status' => 'success', 'msg' => 'Post approved successfully!']);
   }
   
   public function markasnotapproved($id)
   {
       $post = Post::findOrFail($id);
       $post->is_approved = 0;
       $post->save();
   
       return redirect()->route('viewpost')->with('notify_message', ['status' => 'success', 'msg' => 'Post disapproved successfully!']);
   }
   
   public function showupdatepost($id)
   {
       $post = Post::findOrFail($id);
       return view('admin.post.updatepost', compact('post')); // Create this view
   }
   
   public function updatepost(Request $request, $id)
   {
       $post = Post::findOrFail($id);
   
       $request->validate([
           'content' => 'required',
           'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
   
       $post->content = $request->content;
   
       if ($request->hasFile('post_image')) {
           if ($post->post_image) {
               Storage::disk('public')->delete($post->post_image);
           }
           $post->post_image = $request->file('post_image')->store('post_images', 'public');
       }
   
       $post->save();
   
       return redirect()->route('viewpost')->with('notify_message', ['status' => 'success', 'msg' => 'Post updated successfully!']);
   }

   //...................comments.......................

   public function viewComments($postId)
   {
       $comments = Comment::where('post_id', $postId)->get();
       $post = Post::findOrFail($postId);
   
       return view('admin.post.comments', compact('comments', 'post'));
   }

   public function deleteComment($id)
   {
       $comment = Comment::findOrFail($id);
       $comment->delete();
   
       return redirect()->back()->with('notify_message', ['status' => 'success', 'msg' => 'Comment delete successfully!']);
   }

   public function editComment($id)
   {
       $comment = Comment::findOrFail($id);
   
       return view('admin.post.editcomment', compact('comment'));
   }
   
   public function updateComment(Request $request, $id)
   {
       $comment = Comment::findOrFail($id);
   
       $request->validate([
           'content' => 'required|string',
       ]);
   
       $comment->update([
           'content' => $request->content,
       ]);
   
       return redirect()->route('viewComments', $comment->post_id)->with('notify_message', ['status' => 'success', 'msg' => 'Comment update successfully!']);
   }



   //.........................Chat section.................................

    public function chathome(Request $request)
   {
    $query = Chat::query();

    if ($request->filled('name')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->name . '%');
        });
    }

    if ($request->filled('message')) {
        $query->where('message', 'like', '%' . $request->message . '%');
    }

    $chats = $query->get();
    
    return view('admin.chat.chathome', compact('chats'));
}

public function deletechat($id)
{
    $chat = Chat::findOrFail($id);
    $chat->delete();
    return redirect()->route('chathome')->with('notify_message', ['status' => 'success', 'msg' => 'Chat deleted successfully']);

}

public function showupdatechat($id)
{
    $chat = Chat::findOrFail($id);

    return view('admin.chat.updatechat', compact('chat'));
}

public function updatechat(Request $request, $id)
{
    $chat = Chat::findOrFail($id);
    $chat->message = $request->message;
    $chat->save();

    return redirect()->route('chathome')->with('notify_message', ['status' => 'success', 'msg' => 'Chat updated successfully']);
    
    
}


//........................feedback section.........................................


    
public function viewFeedback(Request $request)
{
    $query = Contact::query();

    if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->email . '%');
    }

    if ($request->filled('message')) {
        $query->where('message', 'like', '%' . $request->message . '%');
    }
    
    $feedbacks = $query->get();
    return view('admin.feedback.feedbackhome', compact('feedbacks'));
}


public function deleteFeedback($id)
{
    $feedback = Contact::findOrFail($id);
    $feedback->delete();
    return redirect()->route('viewFeedback')->with('notify_message', ['status' => 'success', 'msg' => 'Feedback deleted successfully']);
}

public function replyContact($id)
{
    $contact = Contact::findOrFail($id);
    return view('admin.feedback.replycontact', compact('contact'));
}


public function storeReplyContact(Request $request, $id)
{
    $contact = Contact::findOrFail($id);
    $contact->update([
        'reply' => $request->reply,
    ]);
    return redirect()->route('viewFeedback')->with('notify_message', ['status' => 'success', 'msg' => 'Reply sent successfully']);
}




}
