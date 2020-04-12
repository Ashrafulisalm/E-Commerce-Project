<?php

namespace App\Http\Controllers;

//use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class PaymentController extends Controller
{
    public function index(){
        return view('home.payment');
    }

    public function shipping(Request $request){
        $data=array();
        $data['customer_first_name']=$request->customer_first_name;
        $data['customer_last_name']=$request->customer_last_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_phone']=$request->customer_phone;
        $data['customer_city']=$request->customer_city;
        $data['customer_address']=$request->customer_address;

        $shipping=DB::table('shipings')->insertGetId($data);

        Session::put('shiping_id', $shipping);

        return Redirect::to('/payment');

    }

    public function success(Request $request){
        $data=array();
        $data['payment_status']='pending';
        $data['payment_method']=$request->payment_getway;
        $method=$request->payment_getway;
        $payment=DB::table('payments')->insertGetId($data);
        Session::put('payment_id',$payment);
        //return view('home.order_success',compact('method'));


        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shiping_id']=Session::get('shiping_id');
        $odata['payment_id']=Session::get('payment_id');
        $odata['order_total']=\Cart::getTotal();
        $odata['order_status']='pending';
        $order_id=DB::table('orders')->insertGetId($odata);
        Session::put('order_id',$order_id);


        $contents=\Cart::getContent();
        $oddata=array();
        foreach ($contents as $cart){
            $oddata['order_id']=$order_id;
            $oddata['product_id']=$cart->id;
            $oddata['product_name']=$cart->name;
            $oddata['product_price']=$cart->price;
            $oddata['product_quantity']=$cart->quantity;
            $oddata['product_image']=$cart->attributes->image;
            $success=DB::table('order_details')->insert($oddata);
        }
        if($success){
            \Cart::clear();
        }

        return view('home.order_success',compact('method'));
    }

}
