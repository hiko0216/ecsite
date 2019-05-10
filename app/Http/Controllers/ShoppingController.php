<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;

class ShoppingController extends Controller
{
    public function add_to_cart(){
        // dd(request()->all());
        $pt = Product::find(request()->pt_id);

        $cartItem = Cart::add([
            'id'=>$pt->id,
            'name'=>$pt->name,
            'qty'=>request()->qty,
            'price'=>$pt->price,
            'weight'=>500
        ]);

        Cart::associate($cartItem->rowId,'App\Product');

        Session::flash('success','Product added to cart');
        return redirect()->route('cart');
    }
    public function cart(){

        // Cart::destroy();
        $total = Cart::total();
        return view('cart',['total'=>$total]);
    }
    public function incr($rowId,$qty){
        Cart::update($rowId,$qty + 1);

        Session::flash('success','Product quantity updated');
        return redirect()->back();
    }

    public function decr($rowId,$qty){
        Cart::update($rowId,$qty -1 );

        Session::flash('success','Product quantity updated');
        return redirect()->back();
    }
    public function cart_delete($id){
        Cart::remove($id);
        Session::flash('success','Product removed from cart');
        return redirect()->back();
    }
    public function rapid_add($id){
        $pt = Product::find($id);

        $cartItem = Cart::add([
            'id'=>$pt->id,
            'name'=>$pt->name,
            'qty'=>1,
            'price'=>$pt->price,
            'weight'=>500
        ]);
        Cart::associate($cartItem->rowId,'App\Product');

        Session::flash('success','Product added to cart');
        return redirect()->route('cart');
        
    }


}
