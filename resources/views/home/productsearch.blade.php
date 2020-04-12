@extends('layouts.Short_home')
@section('container')
    <h2 class="title text-center">Search Items</h2>
    <div class="container">
    @foreach($product as $row)

        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="268" width="249" alt="" />
                        <h2>{{$row->product_price}} tk</h2>
                        <p>{{$row->product_name}}</p>
                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$row->product_price}}tk</h2>
                            <p><a href="{{url('/viewproduct/'.$row->id)}}">{{$row->product_name}}</a></p>
                            <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="{{url('/viewproduct/'.$row->id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    </div>

@endsection
