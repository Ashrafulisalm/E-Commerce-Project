<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.login');
    }



    public function dashboard(Request $request){
        $admin_email=$request->admin_email;
        $admin_pass=md5($request->admin_password);
        $result=DB::table('admins')->where('admin_email',$admin_email)->where('admin_password',$admin_pass)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->id);
            return view('admin.dashboard');
        } else {
            Session::put('message','Email or Password Invalid');
            return redirect()->back();
        }


    }

}
