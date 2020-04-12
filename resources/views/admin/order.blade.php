@extends('layouts.dashboard')

@section('dashboard_container')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Order</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Catagory</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Order Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach($order as $row)
                        <tbody>
                        <tr>
                            <td>{{$row->id}}</td>
                            <td class="center">{{$row->customer_name}}</td>
                            <td class="center">{{$row->order_total}}</td>
                            <td class="center">
                                @if($row->order_status=='pending')
                                    <span class="label label-danger">Pending</span>
                                @else
                                    <span class="label label-success">Done</span>
                                @endif
                            </td>
                            <td class="center">

                                @if($row->order_status=='pending')
                                    <a class="btn btn-success" href="{{url('/pending/'.$row->id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{url('/done/'.$row->id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif

                                <a class="btn btn-info" href="{{url('/vieworder/'.$row->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{url('/deletecatagory/'.$row->id)}}" id="delete">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    @endforeach
                </table>
                <div class="pagination"> {{ $order->links() }} </div>
            </div>
        </div><!--/span-->

    </div><!--/row-->


@endsection
