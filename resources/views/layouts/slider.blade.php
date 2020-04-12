<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">

                    <?php
                    $slider=\App\Slider::where('slider_publication',1)->get();
                    ?>
                    <ol class="carousel-indicators">
                        @foreach( $slider as $row )
                            <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>

                    <div class="carousel-inner" role="listbox">
                        @foreach( $slider as $row )
                            <div class="item {{ $loop->first ? ' active' : '' }}" >
                                <div class="col-sm-6">
                                    <h1><span>{{ $row->product->product_name}}</span></h1>
                                    <h2>{{$row->product->short_discription}}</h2>
                                    <p>{{$row->product->short_discription}}Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{\Illuminate\Support\Facades\URL::to($row->product->product_image)}}" height="441" width="484"  alt="" />
                                    <img src="{{\Illuminate\Support\Facades\URL::to($row->slider_img)}}"  class="pricing" alt="" />
                                </div>
                            </div>
                        @endforeach
                    </div>



                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>