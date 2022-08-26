<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        return view('front.cart.index');
    }

    public function store(Request $request)
    {

        Cart::add($request->id, $request->name, 1, $request->price, 0);
        return redirect()->back()->with('msg', 'Item has been added cart !');

    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('msg', 'Item has been remove from cart !');

   
    }
}
