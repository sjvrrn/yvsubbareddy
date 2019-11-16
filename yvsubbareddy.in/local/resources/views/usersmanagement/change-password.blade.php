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
	    		<h4 class="abt-title mt-4">Change Password</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				{{ Form::open(array('route' =>[ 'user.change_password_post'],'class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
	    				
	                   <div class="form-group row">
	    					<div class="col-md-3">
	    						Current Password <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::text('current-password',null,array('class' => 'form-control','placeholder'=>'Enter Current Password','required')) }}
	    						
	    						@if ($errors->has('current-password'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('current-password') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div> 
	    				<div class="form-group row">
	    					<div class="col-md-3">
	    						New Password <span class="style1">&nbsp;*</span>
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
	    						Confirm New Password <span class="style1">&nbsp;*</span>
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