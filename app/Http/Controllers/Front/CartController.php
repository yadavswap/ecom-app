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
        $dub = Cart::instance('default')->search(function($cartItem ,$rowId)use($request){
            return $cartItem->id === $request->id;
        });
        if($dub->isNotEmpty()){
            return redirect()->back()->with('msg', 'Item is  already in cart !');

        }
        Cart::add($request->id, $request->name, 1, $request->price, 0);
        return redirect()->back()->with('msg', 'Item has been added cart !');

    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('msg', 'Item has been remove from cart !');

   
    }

    public function saveForLater($id)
    {
    //    dd($id);

        $item = Cart::get($id);
        Cart::remove($id);
        $dub = Cart::instance('saveForLater')->search(function($cartItem ,$rowId)use($id){
            return $cartItem->id === $id;
        });
        if($dub->isNotEmpty()){
            return redirect()->back()->with('msg', 'Item is  saved for later already !');

        }
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price, 0);
        return redirect()->back()->with('msg', 'Item has been saved for later !');

    }
}
