<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Http\Requests\ProfileUpdateRequest;
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
    
        return view('admin.adminhome', compact('customers'));
    }
    

    public function adduser()
    {
        return view('admin.add_user');
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
        return view('admin.edit_user', compact('user'));
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
       return view('admin.post.addpost'); // Create this view
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
   

    

   





}
