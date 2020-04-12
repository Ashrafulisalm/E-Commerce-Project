<?php

namespace App\Http\Controllers;

use App\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

session_start();
class CatagoryController extends Controller
{
    public function index(){
        return view('admin.add_catagory');
    }

    public function addcatagory(Request $request){
            $Catagory=new Catagory;
            $Catagory->catagory_name=$request->catagory_name;
            $Catagory->discription=$request->discription;
            $Catagory->publication=$request->publication;
            $Catagory->save();

      //  $data=array();
      //  $data['catagory_name']=$request->catagory_name;
      //  $data['discription']=$request->discription;
      //  $data['publication']=$request->publication;
        // $cata=DB::table('catagories')->insert($data);

        Session::put('message',"Catagory added Successfully");

        return redirect()->back();
    }


    public function allcatagory(){
        $cata=Catagory::paginate(10);
        return view('admin.all_catagory',compact('cata'));
    }

    public function unactive($id){
        Catagory::where('id',$id)->update(['publication'=>0]);
        return redirect('/allcatagory');

    }

    public function active($id){
        Catagory::where('id',$id)->update(['publication'=>1]);
        return redirect('/allcatagory');

    }

    public function deletecatagory($id){
        Catagory::where('id',$id)->delete();
        return redirect('/allcatagory');
    }

    public function editcatagory($id){
        $catagory=Catagory::where('id',$id)->first();
        return view('admin.edit_catagory',compact('catagory'));
    }

    public function updatecatagory(Request $request,$id){
        $Catagory=Catagory::findorfail($id);
        $Catagory->catagory_name=$request->catagory_name;
        $Catagory->discription=$request->discription;
        $Catagory->publication=$request->publication;
        $Catagory->save();

        Session::put('message',"Catagory updated Successfully");
        return redirect('/allcatagory');
    }

}
