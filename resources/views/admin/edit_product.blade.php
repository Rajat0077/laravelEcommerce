                @extends('layouts.newadmin_dashboard_layout')

                @section('content')

                <ul class="breadcrumb">
                <li>
                <i class="icon-home"></i>
                <a href="index.html">Home </a>
                <i class="icon-angle-right"></i> 
                </li>
                <li>
                <i class="icon-edit"></i>
                <a href="#">Add Category</a>
                </li>
                </ul>
                <div class="row-fluid sortable">
                <div class="box span12">
                <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
                <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
                </div>

                <br>
                <div class="alert-success" style="text-align: center;"> 

                <?php 
                $addcatmessage = Session::get('addcatmessage');					
                if($addcatmessage){
                echo $addcatmessage;
                Session::put('addcatmessage', null);
                }
                ?>

                </div>
                <br>

                <div class="box-content">

                <form class="form-horizontal" method="POST" action="{{URL::to('save-product')}}" enctype="multipart/form-data">

                {{ csrf_field() }}

                {{-- Comment Method--}}

                <fieldset>

                <div class="control-group">
                <label class="control-label" for="date01">Product Name </label>
                <div class="controls">
                <input type="text" class="input-xlarge" name="product_name" value="{{$product[0]->product_name}}">
                </div>
                </div>

                <div class="control-group">
                <label class="control-label" for="date01">Product Category</label>
                <div class="controls">
                <select name="category_id"> 
                <option value="">Select Product Category</option>
                
                <?php 
                $category = DB::table('tbl_category')->get();
                ?>

                @foreach($category as $category_c)
                <option value="{{$category_c -> category_id}}"> {{$category_c -> category_name}}</option>
                @endforeach
                </select>

                </div>
                </div>


                <div class="control-group">
                <label class="control-label" for="date01">Manufacture Name</label>
                <div class="controls">

                <select name="manufacture_id">

                <option value="">Select Manufacture</option>
                <?php 
                $manufacture = DB::table('tbl_manufacture')->get();
                ?>

                @foreach($manufacture as $manufacturee)
                <option value="{{$manufacturee-> manufacture_id}}"> {{$manufacturee-> manufacture_name}}</option>
                @endforeach  

                </select>
                </div>
                </div>


                <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Product Short Description </label>
                <div class="controls">
                <textarea class="cleditor" id="textarea2" name="product_short_description"  rows="3">  
                {{$product[0]->product_short_description}}
                </textarea>
                </div>
                </div>


                <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Product Long Description </label>
                <div class="controls">
                <textarea class="cleditor" id="textarea2" name="product_long_description" rows="3">
                {{$product[0]->product_long_description}}
                </textarea>
                </div>
                </div>


                <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">product_price </label>
                <div class="controls">

                <input type="text" class="input-xlarge" name="product_price" value="{{$product[0]->product_price}}" >
                </div>
                </div>

                <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2"> Product Size</label> &nbsp;&nbsp;&nbsp;&nbsp;  
                <input type="text" class="input-xlarge" name="product_size" value="{{$product[0]->product_size}}" >
                </div>

                <div class="control-group">
                <label class="control-label" for="date01">Product Color</label>
                <div class="controls">
                <input type="text" class="input-xlarge" name="product_color" value="{{$product[0]->product_color}}" >
                </div>
                </div>

                <div class="control-group">
                <label class="control-label" for="date01">Product Image</label>
                <div class="controls">
                <input type="file" class="input-xlarge" name="product_image" >
                <img src="imagesss/{{$product[0]->product_image}}" height="80" width="80"  alt="">
                </div>
                </div>
                
                <div class="control-group">
                <label class="control-label" for="date01">Publication Status</label>
                <div class="controls">
                <input type="checkbox" class="input-xlarge" name="publication_status" value="1" >
                </div>
                </div>

                <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="reset" class="btn">Cancel</button>
                </div>
                </fieldset>
                </form>  


                @if(count($errors) > 0)
                <div class="alert alert-danger" style="font-size: 17px;">
                <ul>
                @foreach($errors->all() as $error)
                <li>
                {{$error}}
                </li>
                @endforeach
                </ul>
                </div>
                @endif


                </div>
                </div><!--/span-->

                </div><!--/row-->

                @endsection