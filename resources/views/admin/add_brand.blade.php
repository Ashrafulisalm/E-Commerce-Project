@extends('layouts.dashboard')
@section('dashboard_container')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Add Brand</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>
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
                <form action="{{url('/addbrand')}}" method="post" class="form-horizontal">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Brand Name </label>
                            <div class="controls">
                                <input name="brand_name" type="text" class="span6 typeahead"   data-provide="typeahead" data-items="4" >

                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Discription</label>
                            <div class="controls">
                                <textarea class="cleditor" name="discription" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status </label>
                            <div class="controls">
                                <input name="publication" type="checkbox" value="1" >

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