<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::take(4)->get();
        return view('front.index',compact('products'));
    }
}
