@extends('layouts.dashboard')

@section('dashboard_container')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Order By </a></li>
    </ul>



    <div class="row-fluid sortable">
        <div class="box span6">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$order->customer->customer_name}}</td>
                        <td class="center">{{$order->customer->customer_phone}}</td>

                    </tr>

                    </tbody>
                </table>

            </div>
        </div><!--/span-->

        <div class="box span6">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shiping Details</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$order->shiping->customer_first_name}} {{$order->shiping->customer_last_name}}</td>
                        <td class="center">{{$order->shiping->customer_phone}}</td>
                        <td class="center">{{$order->shiping->customer_city}}</td>
                        <td class="center">{{$order->shiping->customer_address}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div><!--/span-->

    </div><!--/row-->

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>

            <div class="box-content">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->detail as $row)
                    <tr>
                       <td> <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" width="80" height="100"></td>
                   <td>{{$row->product_name}}</td>
                        <td>{{$row->product_quantity}}</td>
                        <td>{{$row->product_price}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header">
                <h2>Total Price</h2>
                <div class="box-icon">
                    {{$order->order_total}} Tk
                </div>
            </div>


        </div><!--/span-->
    </div><!--/row-->



@endsection