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
					<a href="#">Add Manufacture</a>
				</li>
			</ul>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Test Case</h2>
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
				<!------------------ Start  ---------------------->    					

				{{-- Now Adding Data into Database Using Laravel Form Format Starts--}}

				{!! Form::open(['method'=>'POST' , 'action'=>'TestController@test_save', 'files'=>true ])!!}
				{{ csrf_field() }}	
				{!! Form::label('name' , 'File Name :- ')!!}
				{!! Form::file('name', null , ['class' => 'form-control'])!!}

				{!! Form::submit('Save' , ['class'=>'btn btn-primary'])!!}

				{!! Form::close()!!}

				{{-- Now Adding Data into Database Using Laravel Form Format Ends--}}

				<!------------------ End ---------------------->    
				
				</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection