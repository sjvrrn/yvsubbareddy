@extends('layouts.master')

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
	    		
	    		<div class="row">
<?php  if($status>0){?>
	    			<div class=" offset-md-3 col-md-8 col-xs-12 col-sm-12">
	    				<h4 class="abt-title mt-4">Registration</h4>
	    				<!-- <form action="" class="mt-5" name="myForm">  -->
	    					{{ Form::open(array('route' => 'visitor.storerefer','class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
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
	                               
	                                {{ Form::number('mobile',null,array('class' => 'form-control','placeholder'=>'Enter your Mobile No','required')) }}
	    						
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
	                                <!-- {{ Form::date('darshan_date','null',array('id'=>'darshan_date','class' => 'form-control','placeholder'=>'yyyy-mm-dd','required', 'min' =>  date('Y-m-d'))) }}  -->
	                               
	                                		  <input type="date" name='darshan_date' class="form-control"  min="date('Y-m-d')" required value="" >
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
	                                
	                            	<select name="darshan_type" class="form-control" required id="darshan_type">
	                            		<option value="">SELECT DARSHAN TYPE</option>
	                            		<option value="VIP BREAK">VIP BREAK</option>
	                            		<option value="SPECIAL DARSHNAM">SPECIAL DARSHNAM</option>
	                            		<option value="ACCOMIDATION">ACCOMIDATION</option>
	                            		<option value="ARJITHA SEAVAS">ARJITHA SEAVAS</option>
	                            	</select>
	                                @if ($errors->has('darshan_type'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('darshan_type') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                         <div class="form-group row" >
	                            <div class="col-md-3">
	                               SUB Darshanam Type 
	                            </div>
	                            <div class="col-md-9">
	                            	<select name="subdarshan_type_id" class="form-control" id='subdarshanam'>
	                            		<option value="">SELECT SUBDARSHAN</option>
	                            		<option value="1">SUPRABHATHAM</option>
	                            		<option value="2">THOMALA SEVA</option>
	                            		<option value="3">ARCHANA</option>
	                            		<option value="4">KALYNOTSAVAM</option>
	                            		<option value="5">ARJITHA BRAHMOTSAVAM</option>
	                            		<option value="6">DOLOTSAVAM</option>
	                            		<option value="7">VASANTHOTSAVAM</option>
	                            		<option value="8">SAHASRA DEEPALANKARA SEVA</option>
	                            		<option value="9">VISESHA POOJA</option>
	                            		<option value="10">ASTADALAPADA PADMARADHANA</option>
	                            		<option value="11">SAHASRAKALASHABHISHEKAM</option>
	                            		<option value="12">TIRUPPAVADA</option>
	                            		<option value="13">VASTRALANKA SEVA</option>
	                            		<option value="14">POORABHISHEKAM</option>
	                            		<option value="15">NIJAPADA DARSHANAM</option>
	                            		<option value="16">FLOAT FESTIVAL</option>
	                            		<option value="17">VASANTHOSTSAVAM(ANNUAL)</option>
	                            		<option value="18">PADMAVATHI PARINAYAM</option>
	                            		<option value="19">ABHIDEYAKA ABHISHEKAM</option>
	                            		<option value="20">PUSHPA PALLAKI</option>
	                            		<option value="21">PAVITHROTSAVAM</option>
	                            		<option value="22">PUSHPA YAGAM</option>
	                            		<option value="23">KALYNOTSAVAM</option>
	                            		<option value="24">KOLL ALWAR TIRUMANJANAM</option>
	                            	</select>
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
	                              <!--	<select name="ref_name" class="form-control" id="ref_name">
									<option>Select Reference Name</option>
									</select>-->
	                           
	                              @if ($errors->has('ref_name'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('ref_name') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                       
							<input type="hidden" name="url" value="<?=Request::url();?>">
	                        <div class="form-group row">
	                            <div class="col-md-3">&nbsp;</div>
	                            <div class="col-md-9"> 
	                            	{{ Form::token() }}
	                                <input id="input-submit" value="Submit" type="submit" class="btn btn-success">
	                            </div>
	                        </div>

                     
                    {{ Form::close() }}
                    
                        
	    			</div>
	    		<?php  }else{

echo'<div class="alert alert-danger col-md-12">
	    				Invalid Url Please Try Again.
	    			</div>';
	    		}?>
	    			
	    		</div>
	    	</div>
	    </div>
	    @endsection
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <script>
	    	$(document).ready(function(){ console.log('hello');
                     $(".container").css('display','none');
                     $(".navbar").css('display','none');

	    	})

	    </script>
	    <script>
        $(document).ready(function(){ 
              $("#subdarshanam").prop("disabled",true);
              $(document).on('change','#darshan_type',function(){
                var val = $(this).val(); 
                if(val==="ARJITHA SEAVAS"){
                        $("#subdarshanam").prop("disabled",false);
                      }else{
                        $("#subdarshanam").val(""); 
                        $("#subdarshanam").prop("disabled",true);
                      }
                                    });

        });

      </script>