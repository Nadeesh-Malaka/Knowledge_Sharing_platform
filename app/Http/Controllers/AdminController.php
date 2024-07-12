<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Http\Requests\ProfileUpdateRequest;
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

    

   















    public function approveCustomer(User $user)
    {
        $user->update(['is_approved' => true]);
        return redirect()->route('admin.customers')->with('status', 'Customer approved successfully.');
    }

    public function deleteCustomer(User $user)
    {
        $user->delete();
        return redirect()->route('admin.customers')->with('status', 'Customer deleted successfully.');
    }
}
