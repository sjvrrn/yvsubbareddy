@extends('layouts.app')
@section('content')
<div class="content">
	<?php   $slides =  $data['slides'];
			 $Headslides =  $data['Headslides']
	?>
	@if(Session::has('success'))
	    			<div class="alert alert-success">
	    				{{ Session::get('success') }}
	    			</div>
	    			@elseif( Session::has( 'warning' ))
	    			<div class="alert alert-danger">
	    				{{ Session::get( 'warning' ) }}
	    			</div>
	    			@endif
<!-- container panes -->	    			
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <style>
 	.form-group .form-control, .input-group .form-control{
 		padding:0px !important;
 	}
 </style>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Slide</a></li>
    <li><a data-toggle="tab" href="#menu1">HeadImages</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     <!-- slides -->
<div class="page-container card" style="margin-bottom: 180px;">
<!-- 	    		<h4 class="abt-title mt-4">Slides</h4> -->
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				<!-- <form action="" class="mt-5" name="myForm">  -->
	    				{{ Form::open(array('route' => 'visitor.slides','class' => 'form-horizontal mt-5', 'name'=>'myForm', 'files' => true)) }}                       
	    				   <div class="form-group row">
	    				   	<div class="col-md-3">Slide Type<b style="color:red">*</b></div>
	    				   	<select class="form-control col-md-9" name="type">
	    				   		<option>Select Type</option>
	    				   		<option value="1">Slides</option>
	    				   		<option value="2">HeadImages</option>
	    				   	</select>
	    				   </div>
	                       <div class="form-group row">
	                            <div class="col-md-3">Slides<b style="color:red">*</b></div>
	                            <div class="col-md-9"> 
	                            {{Form::file('user_photo')}}
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">&nbsp;</div>
	                            <div class="col-md-9"> 
	                            	{{ Form::token() }}
	                                <input id="input-submit" value="Submit" type="submit" class="btn btn-success">
	                            </div>
	                        </div>

                     
                    {{ Form::close() }}
                        
	    			</div>
	    		</div>
	    		<div class='row'>
	    			<table class="table table-bordered">
    <thead>
      <tr>
        <th>S.NO</th>
        <th>Slide</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
     <?php $i=1; foreach($slides as $slide){ ?>
      <tr id="row<?php echo $slide->id;?>">
        <td><?php echo $i;?></td>
        <td><img class="img img-responsive" src="{{url('/')}}/local/public/slides/<?php echo $slide->path;?>"/> </td>
        <td><button class=" btn btn-success delete" data-name="<?php echo $slide->path;?>" id="<?php echo $slide->id;?>">Delete</button></td>
      </tr>
      <?php $i++;} ?>
    </tbody>
  </table>

	    		</div>
	    	</div>
     <!-- slides end -->
    </div>
    <div id="menu1" class="tab-pane fade">
     <!-- second panel -->
     <div class="page-container card" style="margin-bottom: 180px;">
<!-- 	    		<h4 class="abt-title mt-4">Slides</h4> -->
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				<!-- <form action="" class="mt-5" name="myForm">  -->
	    				
                        
	    			</div>
	    		</div>
	    		<div class='row'>
	    			<table class="table table-bordered">
    <thead>
      <tr>
        <th>S.NO</th>
        <th>Slide</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
     <?php $i=1; foreach($Headslides as $slide){ ?>
      <tr id="row<?php echo $slide->id;?>">
        <td><?php echo $i;?></td>
        <td><img class="img img-responsive" src="{{url('/')}}/local/public/slides/<?php echo $slide->path;?>"/> </td>
        <td><button class=" btn delete" data-name="<?php echo $slide->path;?>" id="<?php echo $slide->id;?>">Delete</button></td>
      </tr>
      <?php $i++;} ?>
    </tbody>
  </table>

	    		</div>
	    	</div>
     <!-- second panel end -->
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

<!-- panes end -->
	    	
	    </div>
	    <script>
	    	$(document).ready(function(){ 
	    		$(document).on('click','.delete',function(){
	    			if (confirm('Are you sure you want to Delete ?')) {
	    			var id = $(this).attr('id'); 
	    			var name = $(this).data('name');
	    			var Url = "<?php echo url('/dimage')?>";
	    			console.log(Url);
	    			$.ajax({
	    				type:'POST',
	    				url:Url,
	    				data:{
						        "_token": "{{ csrf_token() }}",
						        "id": id,
						        "name":name,
						        },
	    				success:function(data){
                         if(data){
                         	$("#row"+id).css('display','none');
                         	alert('POST DELETED SUCCESSFULLY');
                         	}

	    				},
	    			});
	    		}

	    			});
	    	});

	    </script>
	    @endsection