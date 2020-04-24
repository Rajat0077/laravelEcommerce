@extends('layouts.newadmin_dashboard_layout')

@section('content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
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
						
                        <form class="form-horizontal" method="" action="{{URL::to('save-category')}}">
                        
                        {{ csrf_field() }}

                        {{-- Comment Method--}}
                        
                          <input type="hidden" name="_method" value="POST">

                          <fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Category Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="category_name" >
							  </div>
							</div>

							          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description </label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="category_description" rows="3"></textarea>
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