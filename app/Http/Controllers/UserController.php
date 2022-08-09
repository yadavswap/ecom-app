<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users =User::with('orders')->get();
        return view('admin.users.index',compact('users'));
    }
}
