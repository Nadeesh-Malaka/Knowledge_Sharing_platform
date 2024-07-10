<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{

    public function home(Request $request)
    {
        $search = $request->input('search');

        // Fetch all approved posts by default
        $posts = Post::with('user')->where('is_approved', true);

        // Filter posts if search term is provided
        if ($search) {
            $posts->where(function ($query) use ($search) {
                $query->where('content', 'like', '%' . $search . '%');
                // You can add more conditions here based on your needs
            });
        }

        $posts = $posts->get();

        return view('user.home', compact('posts'));
    }

    // public function adminhome()
    // {
    //     return view('admin.adminhome');
    // }

    public function about()
    {
        return view('user.about');
    }
 

    public function faq()
    {
        return view('user.faq');
    }

    public function privacy()
    {
        return view('user.privacy');
    }

    public function que()
    {
        return view('user.que');
    }

    public function rules()
    {
        return view('user.rules');
    }

    public function myProfile()
    {
        return view('user.Profile');
    }




}
