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
                <div class="form-inline">
                    <form action="{{url('/productsearch')}}" method="get">
                        <div class="input-group-prepend">
                            <input class="form-control mr-sm-2" type="search" name="search" class="form-group">
                            <span class="input-group-prepend">
                                <button class="btn btn-primary btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
                            </span>
                        </div>
                    </form>
                </div>


                <table class="table table-striped table-bordered bootstrap-datatable ">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Catagory Id</th>
                        <th>Sub-Catagory </th>
                        <th>Brand</th>
                        <th>Short Discription</th>
                        <th>Long Discription</th>
                        <th>Product Image</th>
                        <th>Product price</th>
                        <th>Product size</th>
                        <th>Product color</th>
                        <th>Publication</th>


                    </tr>
                    </thead>
                    @foreach($product as $row)
                        <tbody>
                        <tr>
                            <td>{{$row->id}}</td>
                            <td class="center">{{$row->product_name}}</td>
                            <td class="center">{{$row->catagory_name}}</td>
                            <td class="center">{{$row->subcatagory_name}}</td>
                            <td class="center">{{$row->brand_name}}</td>
                            <td class="center">{{$row->short_discription}}</td>
                            <td class="center">{{$row->long_discription}}</td>
                            <td class="center" ><img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" width="80" height="100"></td>
                            <td class="center">{{$row->product_price}}tk</td>
                            <td class="center">{{$row->product_size}}</td>
                            <td class="center">{{$row->product_color}}</td>

                            <td class="center">
                                @if($row->product_publication==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-success">Unactive</span>
                                @endif
                            </td>
                            <td class="center">

                                @if($row->product_publication==1)
                                    <a class="btn btn-success" href="{{url('/punactive/'.$row->id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-danger" href="{{url('/pactive/'.$row->id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif

                                <a class="btn btn-info" href="{{url('/editproduct/'.$row->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-primary" href="{{url('/addimage/'.$row->id)}}">
                                    <i class="halflings-icon white image"></i>
                                </a>
                                <a class="btn btn-danger" href="{{url('/deleteproduct/'.$row->id)}}" id="delete">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    @endforeach
                </table>
                <div class="pagination"> {{ $product->links() }} </div>
            </div>
        </div><!--/span-->

    </div><!--/row-->


@endsection
