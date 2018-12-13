<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{


    use AuthenticatesUsers;

    public function __construct(){

        $this->middleware('guest:admin',['except' =>['Logout']]);
    }


    Public function ShowLogin(){


        return view('admin.auth.login');

    }

    public function Login(Request $request)
    {

        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            return redirect()->intended(route('dashboard'));
        }

        else {

            return redirect()->back()->withInput($request->only(['email','remember']))->withMessage('Email or Password invalid');
        }

    }

    public function Logout(){

        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');

    }
}
