<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Catagory;
use App\Image;
use App\Product;
use App\Sub_catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Session;

session_start();
class ProductController extends Controller
{
    public function index(){
       // $catagory=Catagory::all();
        $catagories = DB::table('catagories')->pluck("catagory_name","id");
        $brand=Brand::all();
        return view('admin.product.add_product',compact('brand','catagories'));
    }


    public function getSubcatagory($id)
    {
        $states = DB::table("sub_catagories")->where("catagory_id",$id)->pluck("subcatagory_name","id");
        return json_encode($states);
    }


    public function addproduct(Request $request)
    {
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->catagory_id = $request->catagory_id;
        $product->brand_id = $request->brand_id;
        $product->subcatagory_id = $request->subcatagory_id;
        $product->short_discription = $request->short_discription;
        $product->long_discription = $request->long_discription;
        $product->product_price=$request->product_price;
        $product->product_size=$request->product_size;
        $product->product_color=$request->product_color;
        $product->product_publication=$request->product_publication;
        $img=$request->file('product_image');
        if($img) {
            $random = Str::random(10);
            $image_name = $random;
            $ext = strtolower($img->getClientOriginalExtension());
            $image_fname = $image_name . '.' . $ext;
            $upload_path = 'frontend/';
            $image_url = $upload_path . $image_fname;
            $success = $img->move($upload_path,$image_fname);

            //$data['image']=$image_url;
            if($success){
            $product->product_image = $image_url;
            $product->save();

            //DB::table('posts')->insert($data);
            Session::put('message', "Product added Successfully");

            return redirect()->back();}

        }
        else
        {
            $product->save();

            Session::put('message', "Something Went Wrong!");

            return redirect()->back();

        }


    }


    public function allproduct(){
        $product=Product::orderBy('product_name')->paginate(6);
       // $product=DB::table('products')
        //    ->join('catagories','products.catagory_id','catagories.id')
       //     ->join('sub_catagories','products.subcatagory_id','sub_catagories.id')
       //     ->select('products.*','catagories.catagory_name')
      //      ->get();
        return view('admin.product.all_product',compact('product'));
    }


    public function unactive($id){
        Product::where('id',$id)->update(['product_publication'=>0]);
        return redirect('/allproduct');

    }

    public function active($id){
        Product::where('id',$id)->update(['product_publication'=>1]);
        return redirect('/allproduct');

    }

    public function deleteproduct($id){
        Product::where('id',$id)->delete();
        return redirect('/allproduct');
    }

    public function editproduct($id){
        $product=Product::findorfail($id);
        $catagory=Catagory::all();
        $subcatagory=Sub_catagory::all();
        $brand=Brand::all();
        return view('admin.product.edit_product',compact('product','catagory','subcatagory','brand'));
    }

    public function updateproduct(Request $request,$id){
        $product =Product::findorfail($id);
        $product->product_name = $request->product_name;
        $product->catagory_id = $request->catagory_id;
        $product->brand_id = $request->brand_id;
        $product->subcatagory_id = $request->subcatagory_id;
        $product->short_discription = $request->short_discription;
        $product->long_discription = $request->long_discription;
        $product->product_price=$request->product_price;
        $product->product_size=$request->product_size;
        $product->product_color=$request->product_color;
        $product->product_publication=$request->product_publication;
       // @unlink($request->Old_image);
        $img=$request->file('product_image');
        if($img) {
            @unlink($request->Old_image);
            $random = Str::random(10);
            $image_name = $random;
            $ext = strtolower($img->getClientOriginalExtension());
            $image_fname = $image_name . '.' . $ext;
            $upload_path = 'frontend/';
            $image_url = $upload_path . $image_fname;
            $success = $img->move($upload_path,$image_fname);

            //$data['image']=$image_url;
            if($success){
                $product->product_image = $image_url;
                $product->save();

                //DB::table('posts')->insert($data);
                Session::put('message', "Product Updated Successfully");

                return redirect('/allproduct');}

        }
        else
        {
            $product->product_image=$request->Old_image;
            $product->save();

            Session::put('message', "Product Updated Successfully");

            return redirect('/allproduct');

        }

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
        return view('admin.product.search',compact('product'));
    }


    public function addimage($id){
        $img=$id;
        return view('admin.product.addimage',compact('img'));
    }


    public function addproductimage(Request $request){
        $id=$request->product_id;
        $data=Image::where('product_id',$id)->get();
        $pimage=Product::findorfail($id);
        if (count($data)==0){
            $image1=new Image;
            $image1->product_id=$id;
            $image1->image=$pimage->product_image;
            $image1->save();
        }

        $product=new Image;
        $product->product_id=$request->product_id;
        $image=$request->file('image');
        if($image){
            $img_name=\Illuminate\Support\Str::random(10);
            $img_n=$img_name;
            $ext=strtolower($image->getClientOriginalExtension());
            $img_fname=$img_n.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$img_fname;
            $success=$image->move($upload_path,$img_fname);
            if($success){
                $product->image=$image_url;
                $product->save();

                Session::put('message', "Product Updated Successfully");
                return Redirect::back();
            } else {
                Session::put('message', "Something Went Wrong!");
                return Redirect::back();
            }
        }
    }



}
