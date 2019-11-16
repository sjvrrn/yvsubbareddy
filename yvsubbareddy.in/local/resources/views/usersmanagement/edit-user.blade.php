@extends('layouts.app')

@section('content')
<div class="content">
    @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @elseif( Session::has( 'warning' ))
                                <div class="alert alert-danger">
                                    {{ Session::get( 'warning' ) }}
                                </div>
                                @endif
                    <div class="page-container card" style="margin-bottom: 180px;">
	    		<h4 class="abt-title mt-4">Update Office staff</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				{{ Form::open(array('route' =>[ 'user.update', $user->id],'class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
	    				<div class="form-group row">
	    					<div class="col-md-3">
	    						Name <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::text('name',$user->name,array('class' => 'form-control','placeholder'=>'Enter Name','required')) }}
	    						
	    						@if ($errors->has('name'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('name') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div>
	                   <div class="form-group row">
	    					<div class="col-md-3">
	    						Email <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::text('email',$user->email,array('class' => 'form-control','placeholder'=>'Enter Email','required')) }}
	    						
	    						@if ($errors->has('email'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('email') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div> 
	                   	<div class="form-group row mt-2">
	                            <div class="col-md-3">
	                                Status <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                {{Form::select('status', array('1' => 'Active', '0' => 'Inactive') ,$user->status ,array('class' => 'form-control','required'))}}
                                @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
	                            </div>
	                        </div>
	                         <!-- start -->
	                       	<div class="form-group row mt-2">
	                            <div class="col-md-3">
	                                Responsibilities <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                               <select name="response" class='form-control' >
	                               	   <option value='1'>PENDING</option>
	                               	   <option value='2'>REJECT</option>
	                               	   <option value='3'>ALL LIST</option>
	                               	   <option value='4'>ADD REGISTRATION</option>
	                               	   <option value='6'>ADD USER</option>
	                               	   <option value='7'>ADD MESSAGE</option>
	                               	   <option value='8'>ADD SLIDES</option>
	                               	   <option value='9'>REFER URL</option>
	                               	   <option value='10'>STATICS</option>
	                               </select> 
	                            </div>
	                        </div>
	                       <!-- end -->
	                       
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
        <th>ResponsibilityName</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
     <?php
$roles = array('','Pending List','Reject List','All List','Add Registration','','Add User','Add Message','Add Slides','Refer Url','Stastics');

      $i=1; foreach($responses as $response){ ?>
      <tr id="row<?php echo $response->id;?>">
        <td><?php echo $i;?></td>
        <td><?php echo $roles[$response->response_id];?> </td>
        <td><button class=" btn btn-success delete" id="<?php echo $response->id;?>">Delete</button></td>
      </tr>
      <?php $i++;} ?>
    </tbody>
  </table>

	    		</div>
	    	</div>
	    </div>
	    <script>
	$(document).ready(function(){ 
		$(document).on('click','.delete',function(){
			if (confirm('Are you sure you want to Delete ?')) {
			var id = $(this).attr('id'); 
			var name = $(this).data('name');
			var Url = "<?php echo url('/dresponse')?>";
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