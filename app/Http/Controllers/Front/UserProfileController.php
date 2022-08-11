<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class UserProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
     
        $user = User::find($id);
        $orders = Order::where('user_id',$id)->get();
        // dd($order);
        return view('front.profile.index',compact(['user','orders']));
    }
}
