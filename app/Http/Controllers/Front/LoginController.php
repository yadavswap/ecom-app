<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('front.login.index');
    }

    public function store(Request $request)
    {
        //    validate

        $rules = [
            'email'    => 'required|email',
            'password' => 'required',
        ];

        $request->validate($rules);
        // check if exists
        $data = request(['email', 'password']);
        if (!auth()->attempt($data)) {
            return back()->with(["msg", "wrong details please try again"]);

        }
        return redirect()->route('profile.index');
    }

    public function logout()
    {
       auth()->logout();
        redirect()->route('user.login')->with('msg','You have been logged out successfully ');
    }
}
