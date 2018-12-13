<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

        $admins = Admin::all();
        $i = 1;

        return view('admin.users.index',compact('admins','i'));

    }

    public function create(){

        return view('admin.users.create');


    }

    public function ResetIndex(Admin $admin){


        return view('admin.users.reset',compact('admin'));


    }
    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',

        ]);

        $admin = new Admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;

        $admin->save();

        session()->flash('message','User created successfully');

        return redirect()->route('admin.index');

    }


    public function reset(Request $request, Admin $admin ){

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',

        ]);

        $input = $request->only(['password']);

        $admin->update($input);

        session()->flash('message','User password reset successful');

        return redirect()->route('admin.index');

    }




}
