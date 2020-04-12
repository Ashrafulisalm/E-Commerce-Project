@extends('layouts.home')
@section('home_container')

    <div class="product-details"><!--product-details-->

        <div class="col-sm-5">
            <?php
            $id1=$data->id;
            $test=\App\Image::where('product_id',$id1)->get();
            if(count($test)!=0){
            ?>
            <div class="view-product">
            <!-- <img src="{{\Illuminate\Support\Facades\URL::to($data->product_image)}}" alt="" />  -->
                <?php
                $n=0;
                $id=$data->id;
                $image=\App\Product::findorfail($id);
                foreach($image->image as $data1)
                { $image1[$n]=$data1->image; ?>
                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img class="img1" src="{{\Illuminate\Support\Facades\URL::to($data1->image)}}" >
                </div>
                <?php $n++; } ?>

            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <div class="inline">
                    <?php
                    for($i=0;$i<$n;$i++)
                    { if($i<5){ ?>

                    <img class=" img2" src="{{\Illuminate\Support\Facades\URL::to($image1[$i])}}"  onclick="currentSlide({{$i+1}})" height="50" width="50" >

                    <?php } }?>
                </div>
            </div>
            <?php } else { ?>
            <div class="view-product">
                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img class="img1" src="{{\Illuminate\Support\Facades\URL::to($data->product_image)}}" >
                </div>
            </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <div class="inline">
                        <img class=" img2 cursor" src="{{\Illuminate\Support\Facades\URL::to($data->product_image)}}"  onclick="currentSlide(1)" height="50" width="50" >
                    </div>
                </div>

            <?php } ?>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$data->product_name}}</h2>
                <p>Product ID: EC{{$data->catagory->catagory_name}}100{{$data->id}} </p>
               <!-- <img src="images/product-details/rating.png" alt="" />  -->
                                <span>
									<span>{{$data->product_price}} tk</span>
                                    <form action="{{url('/addtocart')}}" method="post" >
                                        @csrf
									    <label>Quantity:</label>
									    <input name="qty" type="text" value="1" />
                                        <input type="hidden" value="{{$data->id}}" name="product_id">

									    <button  type="submit" class="btn btn-fefault cart" >
										    <i class="fa fa-shopping-cart"></i>
										    Add to cart
									    </button>
                                    </form>
								</span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> {{$data->brand->brand_name}}</p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>

    </div><!--/product-details-->




    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Details</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Size Available</a></li>
                <li><a href="#tag" data-toggle="tab">Color</a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <h2>{{$data->short_discription}}</h2>
                        <p>{{$data->long_discription}}</p>
                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="companyprofile" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <h3>{{$data->product_size}}</h3>
                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="tag" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <h3>{{$data->product_color}}</h3>
                    </div>
                </div>

            </div>
            <?php
            $id=$data->id;
            $customer=Session::get('customer_id');
            //$shiping=Session::get('shiping_id');
            $customer1=Session::get('customer_name');
            ?>
            @if($customer!=null)
            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>{{$customer1}}</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <?php
                    $com=\App\Comment::where('product_id',$id)->orderBy('id', 'desc')->get();
                    ?>
                    @foreach($com as $row)
                    <div>
                        <p><b>{{$row->customer_name}}     </b>{{$row->created_at}}</p>
                        <span><p>{{$row->comment}}</p></span>
                    </div>
                    @endforeach
                    <p><b>Write Your Review</b></p>

                    <form action="{{url('/addcomment')}}" method="post">
                        @csrf
                        <input class="hidden" name="product_id" value="{{$data->id}}">
                        <input class="hidden" name="customer_name" value="{{$customer1}}">
                        <textarea name="comment" ></textarea>
                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                        <button type="submit" value="submit" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
                @else
                <div class="tab-pane fade active in" id="reviews" >
                    <?php
                    $com=\App\Comment::where('product_id',$id)->orderBy('id', 'desc')->get();
                    ?>
                    @foreach($com as $row)
                        <div>
                            <?php $newtime = strtotime($row->created_at);
                            $time = date('M d, Y',$newtime);
                            ?>
                            <p><b>{{$row->customer_name}}  -    </b>{{$time}}</p>
                            <span><p>{{$row->comment}}</p></span>
                        </div>
                    @endforeach
                </div>
                @endif

        </div>
    </div><!--/category-tab-->

@endsection
