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
	    		<h4 class="abt-title mt-4">Add new Office staff</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				{{ Form::open(array('route' =>[ 'user.store'],'class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
	    				<div class="form-group row">
	    					<div class="col-md-3">
	    						Name <span class="style1">&nbsp;*</span>
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
	    					<div class="col-md-3">
	    						Email <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::text('email',null,array('class' => 'form-control','placeholder'=>'Enter Email','required')) }}
	    						
	    						@if ($errors->has('email'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('email') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div> 
	    				<div class="form-group row">
	    					<div class="col-md-3">
	    						Password <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::password('password',array('class' => 'form-control','placeholder'=>'Enter Password','required')) }}
	    						
	    						@if ($errors->has('password'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('password') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div> 
	    				<div class="form-group row">
	    					<div class="col-md-3">
	    						Confirm Password <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::password('password_confirmation',array('class' => 'form-control','placeholder'=>'Enter Password','required')) }}
	    						
	    						@if ($errors->has('password_confirmation'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('password_confirmation') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div> 
	                   	<div class="form-group row mt-2">
	                            <div class="col-md-3">
	                                Status <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                {{Form::select('status', array('1' => 'Active', '0' => 'Inactive') ,null ,array('class' => 'form-control','required'))}}
                                @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
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