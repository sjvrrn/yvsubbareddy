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
	    		<h4 class="abt-title mt-4">Message</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				<!-- <form action="" class="mt-5" name="myForm">  -->
	    				{{ Form::open(array('route' => 'visitor.message','class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
	    				<!--<div class="form-group row">
	                            <div class="col-md-3">
	                                Message<span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                               
	                                {{ Form::textarea('message',null,array('class' => 'form-control','placeholder'=>'Enter your Message','required')) }}
	    						{{ Form::hidden('createdBy', '1') }}
	    						@if ($errors->has('message'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('message') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>-->
	                         <div class="form-group row">
	                            <div class="col-md-3">Message</div>
	                            <div class="col-md-9"> 
	                            	 <textarea id="story" name="message"rows="5" cols="33" class="form-control" placeholder="Enter Message" required>{{$Message->message}}</textarea>
	                            	   <p style="font-family:serif;"><b style="color:red">*</b>Please Give <b>('-' symbol)</b> in Between Message for visitor NAME and Visiting Time .</p>
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
	    	</div>
	    </div>
	    @endsection