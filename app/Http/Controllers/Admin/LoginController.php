<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

 use App\Providers\RouteServiceProvider;
 use Illuminate\Foundation\Auth\AuthenticatesUsers;
 use Illuminate\Support\Facades\Auth;

 
class LoginController extends Controller{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    public function adminlogin(){

        return view('admin.auth.login');  
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    // public function showPasswordChangeForm(){

    //     return Auth::guard('admin')->user()->id;                                               
    // }
}




?>