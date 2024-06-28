<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{

    public function home()
    {

        $posts = Post::with('user')->where('is_approved', true)->get();
        
        return view('user.home', compact('posts'));

    
    }

    public function admindash()
    {
        return view('admin.adminhome');
    }

    public function about()
    {
        return view('user.about');
    }
    
    public function chat()
    {
        return view('user.chat');
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
