<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = 'User Dashboard';
        return view('frontend.user.dashboard', compact('pageTitle'));
    }

    public function add_view(){

        return view('dashboard.users.add');
    }

    public function add(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
    ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'created_at' => now(),
        ]);

        // Redirect with success message
        return back()->with('success', 'New user added successfully');
    }

    // User delete

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('delete_success', 'User Deleted Successfully!');
    }

    // user information edit
    public function edit_view($id)
    {
        $user = User::where('id', $id)->first();
        return view("dashboard.users.edit", compact('user'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'email'=> 'required|email',
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'updated_at' => now(),
        ]);
        return redirect()->route('users.index')->with('success', 'User information updated successfull!');

    }


}
