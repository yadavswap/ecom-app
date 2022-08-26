<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        
       return view('front.cart.index');
    }

    public function store(Request $request)
    {
        // dd($request->price);
        Cart::add($request->id, $request->name, 1, $request->price, 0);
        return redirect()->back()->with('msg','Item has been added cart !');

    }
}
