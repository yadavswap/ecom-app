<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        return view('front.profile.index',compact('user'));
    }
}
