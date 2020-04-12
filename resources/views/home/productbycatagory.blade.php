@extends('layouts.home')
@section('home_container')

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>

            @foreach($product as $row)
                <div class="col-sm-4">
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



        </div><!--features_items-->

        <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active" ><a href="#sharee" data-toggle="tab">Sharee</a></li>
                    <li><a href="#shirt"  data-toggle="tab">Shirt</a></li>
                    <li><a href="#phone" data-toggle="tab">Phone</a></li>
                    <li><a href="#furniture" data-toggle="tab">Furnitures</a></li>
                    <li><a href="#jwelary" data-toggle="tab">Jwelaries</a></li>
                    <li><a href="#panjabi" data-toggle="tab">Panjabi</a></li>
                    <li><a href="#watch" data-toggle="tab">Watches</a></li>
                    <li><a href="#beauty_product" data-toggle="tab">BeautY Products</a></li>
                </ul>
            </div>
            <?php
            $shirt=\App\Product::where('subcatagory_id',1)->inRandomOrder()->take(4)->get();
            $sharee=\App\Product::where('subcatagory_id',6)->inRandomOrder()->take(4)->get();
            $phone=\App\Product::where('subcatagory_id',11)->inRandomOrder()->take(4)->get();
            $furniture=\App\Product::where('subcatagory_id',15)->inRandomOrder()->take(4)->get();
            $jwelary=\App\Product::where('subcatagory_id',7)->inRandomOrder()->take(4)->get();
            $panjabi=\App\Product::where('subcatagory_id',3)->inRandomOrder()->take(4)->get();
            $watch=\App\Product::where('subcatagory_id',5)->inRandomOrder()->take(4)->get();
            $beauty_product=\App\Product::where('subcatagory_id',9)->inRandomOrder()->take(4)->get();
            ?>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="sharee" >
                    @foreach($sharee as $row)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="207" width="183" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade " id="shirt" >
                    @foreach($shirt as $row)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="207" width="183" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="phone" >
                    @foreach($phone as $row)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="207" width="183" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="furniture" >
                    @foreach($furniture as $row)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="207" width="183" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="jwelary" >
                    @foreach($jwelary as $row)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="207" width="183" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="panjabi" >
                    @foreach($panjabi as $row)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="207" width="183" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="watch" >
                    @foreach($watch as $row)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="207" width="183" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="beauty_product" >
                    @foreach($beauty_product as $row)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="207" width="183" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <?php
                        $product1=\App\Product::inRandomOrder()->take(3)->get();
                        foreach ($product1 as $row){
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="134" width="268" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php
                    $catag=\App\Catagory::all();
                    foreach ($catag as $data){
                    $id=$data->id;
                    ?>
                    <div class="item">
                        <?php
                        $product=\App\Product::where('catagory_id',$id)->take(3)->get();
                        foreach ($product as $row){
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{\Illuminate\Support\Facades\URL::to($row->product_image)}}" height="134" width="268" alt="" />
                                        <h2>{{$row->product_price}} tk</h2>
                                        <p>{{$row->product_name}}</p>
                                        <a href="{{url('/viewproduct/'.$row->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->

    </div>


@endsection