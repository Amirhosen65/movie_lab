<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function loginView(){
        return view('dashboard.auth.login');
    }

    public function login(Request $request){
        if(Auth::guard('adminauth')->attempt(['email' => $request->email, 'password' => $request->password])){

            return redirect()->route('admin.dashboard');
        }else{
            return back();
        }
    }

    public function logout(){
        Auth::guard('adminauth')->logout();
        return redirect()->route('admin.login.view');
    }
}
