<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Catagory;
use App\Sub_catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

session_start();
class Sub_catagoryController extends Controller
{
    public function index(){
        $catagory=Catagory::where('publication',1)->get();
        return view('admin.add_subcatagory',compact('catagory'));
    }

    public function addsubcatagory(Request $request){
        $Subcatagory=new Sub_catagory;
        $Subcatagory->catagory_id=$request->catagory_id;
        $Subcatagory->subcatagory_name=$request->subcatagory_name;
        $Subcatagory->publication=$request->publication;
        $Subcatagory->save();

        //  $data=array();
        //  $data['catagory_name']=$request->catagory_name;
        //  $data['discription']=$request->discription;
        //  $data['publication']=$request->publication;
        // $cata=DB::table('catagories')->insert($data);

        Session::put('message',"Sub-Catagory added Successfully");

        return redirect()->back();
    }


    public function allsubcatagory(){
        //$cata=Catagory::all();
        $cata=DB::table('sub_catagories')->join('catagories','catagories.id','sub_catagories.catagory_id')
            ->select('sub_catagories.*','catagory_name')->paginate(10);
        return view('admin.all_subcatagory',compact('cata'));
    }

    public function unactive($id){
        Sub_catagory::where('id',$id)->update(['publication'=>0]);
        return redirect('/allsubcatagory');

    }

    public function active($id){
        Sub_catagory::where('id',$id)->update(['publication'=>1]);
        return redirect('/allsubcatagory');

    }

    public function deletesubcatagory($id){
        Sub_catagory::where('id',$id)->delete();
        return redirect('/allsubcatagory');
    }

    public function editsubcatagory($id){
        $catagory=Sub_catagory::findorfail($id);
        $edit=Catagory::all();
       // $catagory=DB::table('sub_catagories')->join('catagories','sub_catagories.catagory_id','sub_catagories.id')
         //   ->select('sub_catagories.*','catagory_name')
           // ->where('id',$id)
           // ->first();

        return view('admin.edit_subcatagory',compact('catagory','edit'));
    }

    public function updatesubcatagory(Request $request,$id){
        $Subcatagory=Sub_catagory::findorfail($id);
        $Subcatagory->catagory_id=$request->catagory_id;
        $Subcatagory->subcatagory_name=$request->subcatagory_name;
        $Subcatagory->publication=$request->publication;
        $Subcatagory->save();

        Session::put('message',"Sub-Catagory updated Successfully");
        return redirect('/allsubcatagory');
    }

    public function search(Request $request){
        $search=$request->search;


        $cata=Sub_catagory::where('subcatagory_name','like','%'.$search.'%')
            ->paginate(5);
        return view('admin.all_subcatagory',compact('cata'));
    }
}
