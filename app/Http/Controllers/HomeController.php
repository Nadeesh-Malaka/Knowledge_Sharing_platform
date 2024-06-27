<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{

    public function home()
    {
        return view('user.home');
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
