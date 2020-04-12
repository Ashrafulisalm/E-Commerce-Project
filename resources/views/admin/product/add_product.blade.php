@extends('layouts.dashboard')
@section('dashboard_container')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Add Product</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
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
                <form action="{{url('/addproduct')}}" method="post" class="form-horizontal" enctype="multipart/form-data" >
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Name </label>
                            <div class="controls">
                                <input name="product_name" type="text" class="span6 typeahead"   data-provide="typeahead" data-items="4" >

                            </div>
                        </div>



                        <div class="form-group">
                            <label for="country" class="control-label">Select Catagory</label>
                            <div class="controls">
                            <select name="catagory_id" class="form-control" >
                                <option value="">Select Catagory</option>
                                @foreach ($catagories as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div><br>

                        <div class="form-group">
                            <label for="state" class="control-label">Select Sub-catagory</label>
                            <div class="controls">
                            <select name="subcatagory_id" class="form-control">
                                <option>Select Sub-Catagory</option>
                            </select>
                        </div>
                        </div><br>








                        <div class="control-group">
                            <label class="control-label" for="selectError3">Brands</label>
                            <div class="controls">
                                <select id="selectError3" name="brand_id" >
                                    <option>Select Brand</option>
                                    @foreach($brand as $row)
                                        <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Short Discription</label>
                            <div class="controls">
                                <textarea class="cleditor" name="short_discription" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Long Discription</label>
                            <div class="controls">
                                <textarea class="cleditor" name="long_discription" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image</label>
                            <div class="controls">
                                <input name="product_image" class="form-control"  type="file">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Price</label>
                            <div class="controls">
                                <input name="product_price" type="text" class="span6 typeahead"     >

                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Size </label>
                            <div class="controls">
                                <input name="product_size" type="text" class="span6 typeahead"   >

                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Color </label>
                            <div class="controls">
                                <input name="product_color" type="text" class="span6 typeahead"   data-provide="typeahead" data-items="4" >

                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status </label>
                            <div class="controls">
                                <input name="product_publication" type="checkbox" value="1" >

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