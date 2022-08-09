<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required',
            'image'       => 'image|required',
        ]);
        // upload image

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }

        // save data

        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'       => $request->image->getClientOriginalName(),
        ]);

        return redirect('product/create')->with('msg', 'Your Product has been added.');
        // dd($request->all());
        // $product = new Product();
        // $product->name=$request->name;
        // $product->price=$request->price;
        // $product->description=$request->description;
        // $product->image=$request->image;
        // $product->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required',
        ]);

        // if check there is any image
        if ($request->hasFile('image')) {
            // // if check old image inside folder
            // if (file_exists(public_path('uploads/') . $product->image)) {
            //     unlink(public_path('uploads/') . $product->image);
            // }
            // upload new image
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
            $product->image = $request->image->getClientOriginalName();

        }

        $product->name        = $request->name;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->image       = $product->image;
        $product->save();

        return redirect('product')->with('msg', 'Your Product has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product')->with('msg', 'Your Product has been added.');

    }
}
