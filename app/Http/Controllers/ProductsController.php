<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index')->with('products',Product::all());
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
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'image'=>'required|image',
            'descriptino'=>'required'
        ]);

        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/product/',$image_new_name);

        $product=Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'descriptino'=>$request->descriptino,
            'image'=>'uploads/product/'. $image_new_name
        ]);

        Session::flash('success','Products created successfully');

        return redirect()->route('product');
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
    public function edit(Product $product)
    {
        return view('admin.products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'image' =>'nullable|image',
            'descriptino'=>'required'
        ]);

        if($request->hasFile('image')){
            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

             $image->move('uploads/product',$image_new_name);

             $product->image = 'uploads/product/'.$image_new_name;

        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->descriptino = $request->descriptino;
        $product->save();


        Session::flash('success','product updated successfully');

        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Session::flash('success','Product trashed successfully');

        return redirect()->route('product');
    }
}
