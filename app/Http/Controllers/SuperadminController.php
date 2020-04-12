<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class SuperadminController extends Controller
{
    //
    /**
     * @return \Illuminate\Http\RedirectResponse
     */

    public function index(){
        $this->Admin_Auth();
        return view('admin.dashboard');
    }

    public function logout()
    {
      //  Session::put('admin_name',null);
      //  Session::put('admin_id',null);
        Session::flush();
        return Redirect::to('/admin');
    }



    public function Admin_Auth(){
        $admin=Session::get('admin_id');
        if($admin){
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }

}
