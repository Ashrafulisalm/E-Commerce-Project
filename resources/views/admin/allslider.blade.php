@extends('layouts.dashboard')

@section('dashboard_container')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Product</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Slider Image</th>
                            <th>Publication</th>
                        </tr>
                    </thead>
                    @foreach($slider as $row)
                        <tbody>
                            <tr>
                                <td>{{$row->id}}</td>
                                <td class="center">{{$row->product->product_name}}</td>

                                <td class="center" ><img src="{{\Illuminate\Support\Facades\URL::to($row->product->product_image)}}" width="80" height="100"></td>
                                <td class="center" ><img src="{{\Illuminate\Support\Facades\URL::to($row->slider_img)}}" width="80" height="100"></td>


                                <td class="center">
                                     @if($row->slider_publication==1)
                                    <span class="label label-success">Active</span>
                                     @else
                                    <span class="label label-success">Unactive</span>
                                    @endif
                                </td>
                                <td class="center">

                                    @if($row->slider_publication==1)
                                         <a class="btn btn-success" href="{{url('/sunactive/'.$row->id)}}">
                                             <i class="halflings-icon white thumbs-down"></i>
                                         </a>
                                    @else
                                         <a class="btn btn-danger" href="{{url('/sactive/'.$row->id)}}">
                                            <i class="halflings-icon white thumbs-down"></i>
                                         </a>
                                    @endif

                                <a class="btn btn-info" href="{{url('/editproduct/'.$row->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{url('/deleteslider/'.$row->id)}}" id="delete">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->


@endsection