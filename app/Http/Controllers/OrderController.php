<?php

namespace App\Http\Controllers;

use App\Catagory;
use App\Order;
use App\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $order=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('orders.*','customers.customer_name')
            ->paginate(10);

        return view('admin.order',compact('order'));
    }

    public function pending($id){
        DB::table('orders')->where('id',$id)->update(['order_status'=>'done']);
        return redirect('/manage_order');

    }

    public function done($id){
        DB::table('orders')->where('id',$id)->update(['order_status'=>'pending']);
        return redirect('/manage_order');

    }


    public function vieworder($id){
        $order=Order::findorfail($id);
        return view('admin.orderdetails',compact('order'));
    }


}
