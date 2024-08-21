<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function register_view(){
        return view('frontend.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            
            'password' => bcrypt($request->password),
            'created_at' => now(),
        ]);

        return redirect()->route('customer.login')->with('email', $request->email)->with('password', $request->password)->with('success', 'New user registered successfully.');
    }

    public function customer_login(){
        return view('frontend.customerLogin');
    }

    public function customers(){
        $users = User::where('role', 'customer')->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

}


