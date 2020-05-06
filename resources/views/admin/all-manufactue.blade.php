
@extends('layouts.newadmin_dashboard_layout')
@section('content')


<ul class="breadcrumb">
<li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a> 
    <i class="icon-angle-right"></i>
</li>
<li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">	

<?php 
$message = Session::get('message');

if(isset($message)){

echo $message;   // This is not Working Fine ...
Session::put('message' , null);	

}				
?>	
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon user"></i><span class="break"></span>All Manufacture</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
                <tr>
                    <th>Manufacture Name</th>
                    <th>Manufacture Description</th>
                    <th>Publication Status</th>
                
                    <th>Actions</th>
                </tr>
            </thead>   
            <tbody>
            
        @if(count($manufacture))
        @foreach($manufacture->all() as $manufac)
            <tr>
                <td>{{$manufac->manufacture_name}}</td>
                <td class="center">{{$manufac->manufacture_description}}</td>
                <td class="center">{{$manufac->publication_status == 1 ? 'Active' : 'Not Active'}}</td>
                
                <td class="center">

                    @if($manufac->publication_status == 1) 
                    <a class="btn btn-success" href="{{URL::to('/inactive_manufacture/' . $manufac->manufacture_id)}}">
                        <i class="halflings-icon white thumbs-up"></i>  
                    </a>
                    @else 
                    <a class="btn btn-danger" href="{{URL::to('/unactive_manufacture/'. $manufac->manufacture_id)}}">
                        <i class="halflings-icon white thumbs-down"></i>  	
                    </a>
                    
                    @endif

                    <a class="btn btn-info" href="{{URL::to('/edit_manufacture/' . $manufac->manufacture_id)}}">
                        <i class="halflings-icon white edit"></i>  
                    </a>		
                
                    <a class="btn btn-danger" href="{{URL::to('/delete_manufacture/' . $manufac->manufacture_id)}}" id="delete">
                        <i class="halflings-icon white trash"></i> 
                    </a>
                </td>
            </tr>
        @endforeach
        @endif


            </tbody>
        </table>            
    </div>
</div><!--/span-->

</div><!--/row-->


@endsection
