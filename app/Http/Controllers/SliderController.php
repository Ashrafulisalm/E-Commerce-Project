<?php

namespace App\Http\Controllers;

use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

session_start();
class SliderController extends Controller
{
    public function index(){
        $product=Product::where('product_publication',1)->get();
        return view('admin.add_slider',compact('product'));
    }

    public function addslider(Request $request){
        $slider=new Slider;
        $slider->product_id=$request->product_id;
        $slider->slider_publication=$request->slider_publication;
        $img=$request->file('slider_image');
        if($img){
            $random=Str::random(10);
            $img_n=$random;
            $ext=strtolower($img->getClientOriginalExtension());
            $img_fn=$img_n.'.'.$ext;
            $path='frontend/';
            $image_path=$path.$img_fn;
            $success=$img->move($path,$img_fn);
            if($success){
                $slider->slider_img=$image_path;
                $slider->save();
                Session::put('message','Slider added Successfully');
                return redirect()->back();
            } else {
                Session::put('message','Something went wrong');
                return redirect()->back();
            }

        }
    }


    public function allslider(){
        $slider=Slider::all();
        return view('admin.allslider',compact('slider'));
    }

    public function unactive($id){
        Slider::where('id',$id)->update(['slider_publication'=>0]);
        return redirect('/allslider');

    }

    public function active($id){
        Slider::where('id',$id)->update(['slider_publication'=>1]);
        return redirect('/allslider');

    }

    public function deleteslider($id)
    {
        Slider::where('id', $id)->delete();
        return redirect('/allslider');
    }

}
