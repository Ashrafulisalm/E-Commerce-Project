<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Customer;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use phpDocumentor\Reflection\Types\Array_;

session_start();
class CustomerController extends Controller
{
    //login from home===================
    public function index1(){
        return view('home.login1');
    }


    public function customerregister1(Request $request){

        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;

        $data['customer_phone']=$request->customer_phone;
        $data['customer_password']=md5($request->customer_password);

        $customer=DB::table('customers')->insertGetId($data);

        Session::put('customer_id', $customer);
        Session::put('customer_name',$request->customer_name);

        return Redirect::to('/');
    }

    public function homelogin(Request $request){
        $email=$request->customer_email;
        $pass=md5($request->customer_password);
        $data=DB::table('customers')->where('customer_email',$email)->where('customer_password',$pass)->first();
        if($data){
            Session::put('customer_id', $data->id);
            Session::put('customer_name',$data->customer_name);

            return Redirect::to('/');
        } else {
            Session::put('msgg','Invalied Email or Password');
            return redirect()->back();
        }
    }


    //login from cart========================

    public function index(){
        return view('home.login');
    }


    public function customerregister(Request $request){

        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;

        $data['customer_phone']=$request->customer_phone;
        $data['customer_password']=md5($request->customer_password);

        $customer=DB::table('customers')->insertGetId($data);

        Session::put('customer_id', $customer);
        Session::put('customer_name',$request->customer_name);

        return Redirect::to('/checkout');
    }

    public function checkout(){
        return view('home.checkout');
    }

    public function customerlogin(Request $request){
        $email=$request->customer_email;
        $pass=md5($request->customer_password);
        $data=DB::table('customers')->where('customer_email',$email)->where('customer_password',$pass)->first();
        if($data){
            Session::put('customer_id', $data->id);
            Session::put('customer_name',$data->customer_name);

            return Redirect::to('/checkout');
        } else {
            Session::put('msgg','Invalied Email or Password');
            return redirect()->back();
        }
    }




    public function customerlogout(){
        Session::put('customer_id', null);
        Session::put('customer_name', null);
        \Cart::clear();


        return Redirect::to('/');

    }



}
