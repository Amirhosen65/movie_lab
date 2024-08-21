<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }


    public function dashboard(){
        return view('dashboard.index');
    }

    public function fileMan(){
        return view('dashboard.partials.file_m');
    }
}
