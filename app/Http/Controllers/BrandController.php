<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

session_start();

class BrandController extends Controller
{
    public function index(){
        return view('admin.add_brand');
    }

    public function addbrand(Request $request){
        $Brand=new Brand();
        $Brand->brand_name=$request->brand_name;
        $Brand->discription=$request->discription;
        $Brand->publication=$request->publication;
        $Brand->save();

        //  $data=array();
        //  $data['catagory_name']=$request->catagory_name;
        //  $data['discription']=$request->discription;
        //  $data['publication']=$request->publication;
        // $cata=DB::table('catagories')->insert($data);

        Session::put('message',"Brand added Successfully");

        return redirect()->back();
    }


    public function allbrand(){
        $cata=Brand::paginate(10);
        return view('admin.all_brand',compact('cata'));
    }

    public function unactive($id){
        Brand::where('id',$id)->update(['publication'=>0]);
        return redirect('/allbrand');

    }

    public function active($id){
        Brand::where('id',$id)->update(['publication'=>1]);
        return redirect('/allbrand');

    }

    public function deletebrand($id){
        Brand::where('id',$id)->delete();
        return redirect('/allbrand');
    }

    public function editbrand($id){
        $brand=Brand::where('id',$id)->first();
        return view('admin.edit_brand',compact('brand'));
    }

    public function updatebrand(Request $request,$id){
        $Brand=Brand::findorfail($id);
        $Brand->brand_name=$request->brand_name;
        $Brand->discription=$request->discription;
        $Brand->publication=$request->publication;
        $Brand->save();

        Session::put('message',"Brand updated Successfully");
        return redirect('/allbrand');
    }

    public function search(Request $request){
        $search=$request->search;


        $cata=Brand::where('brand_name','like','%'.$search.'%')
            ->orWhere('discription','like','%'.$search.'%')
           ->paginate(5);
        return view('admin.all_brand',compact('cata'));
    }
}
