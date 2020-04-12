<?php

namespace App\Http\Controllers;

use App\Product;
//use Darryldecode\Cart\Cart;
//use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;
use Session;
use phpDocumentor\Reflection\Types\Array_;

session_start();
class CartController extends Controller
{
    public function addtocart(Request $request){
        $qty=$request->qty;
       // $userID=Str::random(4);
        $id=$request->product_id;
        $cart=Product::where('id',$id)->first();

        $data=array();
        $data['quantity']=$qty;
        $data['id']=$id;
        $data['name']=$cart->product_name;
        $data['price']=$cart->product_price;
        $data['attributes']['image']=$cart->product_image;

        \Cart::add($data);

        Session::put('msg','Product Added to Cart!');

        return redirect()->back();//->with('massege', 'Product added to cart!');
        //return Redirect::to('/viewcart');

    }

    public function viewcart(){
        $catagory=DB::table('catagories')->where('publication',1)->get();
        $manage_publish_catagory=view('home.cart')->with('catagory',$catagory);
        return view('layouts.Short_home')->with('home.cart',$manage_publish_catagory);

    }

    public function removecart($id){
        \Cart::remove($id);
        return Redirect::to('/viewcart');
    }

    public function increase(Request $request){
        $id=$request->rowId;
        //$quantity=$request->quantity;

        \Cart::update($id,array(
            'quantity' => +1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        return Redirect::to('/viewcart');

    }

    public function decrease(Request $request){
        $id=$request->rowId;
        //$quantity=$request->quantity;

        \Cart::update($id,array(
            'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        return Redirect::to('/viewcart');

    }





}
