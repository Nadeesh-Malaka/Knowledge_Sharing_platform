<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function adminhome()
    {

        $customers = User::all();
        return view('admin.adminhome',compact('customers'));
    }


    public function viewCustomers()
    {
        // Fetch all customers
        $customers = User::all();
        return view('admin.adminhome', compact('customers'));
    }

    public function approveCustomer(User $user)
    {
        // Approve customer
        $user->update(['is_approved' => true]);
        return redirect()->route('admin.customers')->with('status', 'Customer approved successfully.');
    }

    public function deleteCustomer(User $user)
    {
        // Delete customer
        $user->delete();
        return redirect()->route('admin.customers')->with('status', 'Customer deleted successfully.');
    }
}
