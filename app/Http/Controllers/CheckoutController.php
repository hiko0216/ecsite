<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Mail;
use Session;


class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }
    public function pay(){

       //dd(request()->all());
       Stripe::setApiKey("sk_test_qYXUkTr1jeFeFNdjkhjuECXD007Pstdrwa"); //シークレットキー

        $charge = \Stripe\Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Ecommerce selling photo',
            'source' => request()->stripeToken,
        ]);
        Session::flash('success','Purchase successfully');
        Cart::destroy();
        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);  //mail.phpのユーザーから、入力したemailにsend()メッセージを送る
     return redirect('/');
    }
}
