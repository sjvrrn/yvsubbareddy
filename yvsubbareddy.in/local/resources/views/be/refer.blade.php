@extends('layouts.app')

@section('content')
<style>
.url{
    font-family:serif;
}
#url{
    width:300px;
    border:1px solid #d0b9b9;
}
#note{
    color:brown;
}
</style>
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
	    		<h4 class="abt-title mt-4 url">Refer Url</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				<!-- <form action="" class="mt-5" name="myForm">  -->
	    				{{ Form::open(array('route' => 'user.shareurl','class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
	    			
	                       <div class="form-group row">
	                            <div class="col-md-3 url control-label" >URL:</div>
	                            <div class="col-md-9"> 
	                            	 <input type='text' class="form-control" name='url' value="<?=$url?>" class='url' id="url"/>
	                            	  <p class="url" id='note'>* use (ctl+A) to select Test</p>
	                            </div>
	                           
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Mobile <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                {{ Form::text('mobile',null,array('class' => 'form-control','placeholder'=>'Enter your Mobile No','required')) }}
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