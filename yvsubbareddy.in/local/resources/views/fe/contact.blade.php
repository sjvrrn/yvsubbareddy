@extends('layouts.master')

@section('content')
<div class="container">
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
	    		<h4 class="abt-title mt-4">Contact Us</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				<!-- <form action="" class="mt-5" name="myForm">  -->
	    				{{ Form::open(array('route' => 'contact.store','class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
	    				<div class="form-group row">
	    					<div class="col-md-3 text-align-right">
	    						First and last name <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::text('name',null,array('class' => 'form-control','placeholder'=>'Enter Name','required')) }}
	    						
	    						@if ($errors->has('name'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('name') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div>
	    				<div class="form-group row">
	    					<div class="col-md-3 text-align-right">
	    						Email <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::email('email',null,array('class' => 'form-control','placeholder'=>'Enter Email','required')) }}
	    						
	    						@if ($errors->has('email'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('email') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div>
	                        
	                        <div class="form-group row">
	                            <div class="col-md-3 text-align-right">
	                                Mobile <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                               
	                                {{ Form::text('mobile',null,array('class' => 'form-control','placeholder'=>'Enter your Mobile No','required')) }}
	    						
	    						@if ($errors->has('mobile'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('mobile') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3 text-align-right">
	                                Your message <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                <textarea class="form-control" rows="6" name="message" placeholder="Enter your Message" required=""></textarea>
	                            </div>
	                        </div>
	                        
	                        
	                        
	                        
	                        <div class="form-group row">
	                            <div class="col-md-3 text-align-right">&nbsp;</div>
	                            <div class="col-md-9"> 
	                            	{{ Form::token() }}
	                                <input id="input-submit" value="Submit" type="submit" class="btn btn-success">
	                            </div>
	                        </div>

                     
                    {{ Form::close() }}
                        
	    			</div>
	    			<div class="col-md-4 col-xs-12 col-sm-12">
	    				<img src="assets/images/05.jpg" height="440" width="430">
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    @endsection