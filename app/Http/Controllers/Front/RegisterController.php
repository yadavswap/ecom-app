<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('front.register.index');
    }
    public function store(Request $request)
    {

        // validate
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'address'  => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'address'  => $request->address,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('msg',"User has been created successfully !");

    }
}
