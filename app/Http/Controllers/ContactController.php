<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        return view('user.contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Contact::create($validatedData);

        return redirect()->route('contact')->with('status', 'Your message has been sent successfully!');
    }
}   
