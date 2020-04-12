<?php

namespace App\Http\Controllers;

use App\Catagory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */




    public function index(){
        $data=Catagory::all();
        //$product=Product::all();


        return view('index1',compact('data'));
    }

    public function productbycatagory($id){
        $product=Product::where('subcatagory_id',$id)->get();
        return view('home.productbycatagory',compact('product'));
    }


    public function productbybrand($id){
        $product=Product::where('brand_id',$id)->get();
        return view('home.productbycatagory',compact('product'));
    }

    public function viewproduct($id){
        $data=Product::findorfail($id);
        return view('home.viewproduct',compact('data'));
    }

    public function shirt(){
        $shirt=Product::where('subcatagory_id',1)->get();
        return view('home.product.shirt',compact('shirt'));
    }




    public function productsearch(Request $request){
        $search=$request->search;


        $product=DB::table('products')
            ->join('brands','products.brand_id','brands.id')
            ->join('catagories','products.catagory_id','catagories.id')
            ->join('sub_catagories','products.subcatagory_id','sub_catagories.id')
            ->select('products.*', 'brands.brand_name', 'catagories.catagory_name','sub_catagories.subcatagory_name')
            ->where('product_name','like','%'.$search.'%')
            ->orWhere('short_discription','like','%'.$search.'%')
            ->orWhere('long_discription','like','%'.$search.'%')
            ->orWhere('brand_name','like','%'.$search.'%')
            ->orWhere('catagory_name','like','%'.$search.'%')
            ->orWhere('subcatagory_name','like','%'.$search.'%')
            ->paginate(5);
        return view('home.productsearch',compact('product'));
    }


}
