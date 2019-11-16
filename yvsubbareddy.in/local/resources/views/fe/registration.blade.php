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
	    		<h4 class="abt-title mt-4">Registration</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				<!-- <form action="" class="mt-5" name="myForm">  -->
	    				{{ Form::open(array('route' => 'visitor.store','class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
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
	                            <div class="col-md-3">
	                                Total Members <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                
	                                {{ Form::text('total_members',null,array('class' => 'form-control','placeholder'=>'Enter your total No','required')) }}
	    						
	    						@if ($errors->has('total_members'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('total_members') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Darshanam Date <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                
	                                {{ Form::date('darshan_date',null,array('class' => 'form-control','placeholder'=>'yyyy-mm-dd','required', 'min' =>  date('Y-m-d'))) }} 
	                                @if ($errors->has('darshan_date'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('darshan_date') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Darshanam Type <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                
	                                {{ Form::text('darshan_type',null,array('class' => 'form-control','placeholder'=>'Eg: Special','required')) }} 
	                                @if ($errors->has('darshan_type'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('darshan_type') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Accomidation Date <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                {{ Form::date('accom_date',null,array('class' => 'form-control','placeholder'=>'yyyy-mm-dd','required', 'min' =>  date('Y-m-d'))) }} 
	                                @if ($errors->has('accom_date'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('accom_date') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row mt-2">
	                            <div class="col-md-3">
	                                Reference <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                <select name="reference" class="form-control" id="reference" required>
                                    
                                    <option value="MLA">MLA</option>
                                    <option value="MP">MP</option>
                                    <option value="Other">Other</option>
                                    
                                </select>
                                @if ($errors->has('reference'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reference') }}</strong>
                                </span>
                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Ref Name <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                
	                                {{ Form::text('ref_name',null,array('class' => 'form-control','placeholder'=>'Eg: YV Subbareddy garu','required')) }} 
	                                @if ($errors->has('ref_name'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('ref_name') }}</strong>
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
	    			<div class="col-md-4 col-xs-12 col-sm-12">
	    				<img src="assets/images/05.jpg" height="440" width="430">
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    @endsection