@extends('layouts.newadmin_dashboard_layout')

@section('content')

<!---->

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
<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
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

<div class="container">

{!! Form::open(['method'=>'POST' , 'action'=>'SliderController@save_slider', 'files'=>true ])!!}

<div class="form-group">
{{ csrf_field() }}	
{!!Form::label('slider_img' , 'Add Image')!!}   
{!!Form::file('slider_img' ,null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
{{ csrf_field() }}	
{!!Form::label('published_status' , 'Publication Status')!!}

<input type="checkbox" name="published_status" value="1">


</div>

<br><br>                
<div class="form-group">
{!!Form::submit('Add Slider' , ['class' => 'btn btn-success'])!!}
</div>

<!---->

<!---->        


{!!Form::close()!!}

</div>



</div>
</div><!--/span-->

</div><!--/row-->
<!---->

@endsection