@extends('layouts.dashboard')
@section('dashboard_container')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Add Product Image</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product Image</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <h5 class="alert-success">
                <?php
                $message=Session::get('message');
                if($message){
                    echo $message;
                    Session::put('message',null);
                }

                ?>

            </h5>
            <div class="box-content">
                <form action="{{url('/addproductimage')}}" method="post" class="form-horizontal" enctype="multipart/form-data" >
                    @csrf
                    <fieldset>
                        <input type="hidden" name="product_id" value="{{$img}}">
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image</label>
                            <div class="controls">
                                <input name="image" class="form-control"  type="file">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" value="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->



    </div><!--/row-->


@endsection
