<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      $users = User::all();
      $products= Product::all();
      $orders = Order::all();
      
      return view('admin.dashboard',compact(['users','products','orders']));
    }
}
