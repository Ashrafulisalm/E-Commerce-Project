@extends('layouts.dashboard')

@section('dashboard_container')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Brand</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Brand</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <form action="{{url('/search')}}" method="get">
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
                        <th>Brand Id</th>
                        <th>Brand Name</th>
                        <th>Discription</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach($cata as $row)
                        <tbody>
                        <tr>
                            <td>{{$row->id}}</td>
                            <td class="center">{{$row->brand_name}}</td>
                            <td class="center">{{$row->discription}}</td>
                            <td class="center">
                                @if($row->publication==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-success">Unactive</span>
                                @endif
                            </td>
                            <td class="center">

                                @if($row->publication==1)
                                    <a class="btn btn-success" href="{{url('/bunactive/'.$row->id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-danger" href="{{url('/bactive/'.$row->id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif

                                <a class="btn btn-info" href="{{url('/editbrand/'.$row->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{url('/deletebrand/'.$row->id)}}" id="delete">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    @endforeach
                </table>
                <div class="pagination"> {{ $cata->links() }} </div>
            </div>
        </div><!--/span-->

    </div><!--/row-->


@endsection
