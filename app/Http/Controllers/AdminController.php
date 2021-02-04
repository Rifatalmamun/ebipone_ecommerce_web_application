<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){

        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
