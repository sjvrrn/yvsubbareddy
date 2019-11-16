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
	    		<h4 class="abt-title mt-4">Update Registration</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				<!-- <form action="" class="mt-5" name="myForm">  -->
	    				{{ Form::open(array('route' => ['edit_registration.update',$visitor->id],'class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
	    				<div class="form-group row">
	    					<div class="col-md-3">
	    						Name <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::text('name',$visitor->name,array('class' => 'form-control','placeholder'=>'Enter Name','required')) }}
	    						
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
	                               
	                                {{ Form::text('mobile',$visitor->mobile,array('class' => 'form-control','placeholder'=>'Enter your Mobile No','required')) }}
	    						
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
	                                
	                                {{ Form::text('total_members',$visitor->total_members,array('class' => 'form-control','placeholder'=>'Enter your total No','required')) }}
	    						
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
	                                
	                                {{ Form::date('darshan_date',date('Y-m-d',strtotime($visitor->darshan_date)),array('class' => 'form-control','placeholder'=>'yyyy-mm-dd','required', 'min' =>  date('Y-m-d'))) }} 
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
										<option <?php if($visitor->darshan_type=="VIP BREAK")echo"selected"; ?> value="VIP BREAK">VIP BREAK</option>
										<option <?php if($visitor->darshan_type=="SPECIAL DARSHNAM")echo"selected"; ?> value="SPECIAL DARSHNAM">SPECIAL DARSHNAM</option>
										<option <?php if($visitor->darshan_type=="ACCOMIDATION")echo"selected"; ?> value="ACCOMIDATION">ACCOMIDATION</option>
										<option <?php if($visitor->darshan_type=="ARJITHA SEAVAS")echo"selected"; ?> value="ARJITHA SEAVAS">ARJITHA SEAVAS</option>
	                            	</select>
	    						
	                            </div>
	                        </div>
	                         <div class="form-group row" >
	                            <div class="col-md-3">
	                               SUB Darshanam Type 
	                            </div>
	                            <div class="col-md-9">
	                            <select name="subdarshan_type_id" class="form-control" id='subdarshanam'>
		<option value="">SELECT SUBDARSHAN</option>
		<option <?php if($visitor->subdarshan_type_id==1) echo"selected"; ?> value="1">SUPRABHATHAM</option>
		<option <?php if($visitor->subdarshan_type_id==2) echo"selected"; ?> value="2">THOMALA SEVA</option>	
		<option <?php if($visitor->subdarshan_type_id==3) echo"selected"; ?> value="3">ARCHANA</option>
		<option <?php if($visitor->subdarshan_type_id==4) echo"selected"; ?> value="4">KALYNOTSAVAM</option>
		<option <?php if($visitor->subdarshan_type_id==5) echo"selected"; ?> value="5">ARJITHA BRAHMOTSAVAM</option>
		<option <?php if($visitor->subdarshan_type_id==6) echo"selected"; ?> value="6">DOLOTSAVAM</option>
		<option <?php if($visitor->subdarshan_type_id==7) echo"selected"; ?> value="7">VASANTHOTSAVAM</option>
		<option <?php if($visitor->subdarshan_type_id==8) echo"selected"; ?> value="8">SAHASRA DEEPALANKARA SEVA</option>
		<option <?php if($visitor->subdarshan_type_id==9) echo"selected"; ?> value="9">VISESHA POOJA</option>
		<option <?php if($visitor->subdarshan_type_id==10) echo"selected"; ?> value="10">ASTADALAPADA PADMARADHANA</option>
		<option <?php if($visitor->subdarshan_type_id==11) echo"selected"; ?> value="11">SAHASRAKALASHABHISHEKAM</option>
		<option <?php if($visitor->subdarshan_type_id==12) echo"selected"; ?> value="12">TIRUPPAVADA</option>
		<option <?php if($visitor->subdarshan_type_id==13) echo"selected"; ?> value="13">VASTRALANKA SEVA</option>
		<option <?php if($visitor->subdarshan_type_id==14) echo"selected"; ?> value="14">POORABHISHEKAM</option>
		<option <?php if($visitor->subdarshan_type_id==15) echo"selected"; ?> value="15">NIJAPADA DARSHANAM</option>
		<option <?php if($visitor->subdarshan_type_id==16) echo"selected"; ?> value="16">FLOAT FESTIVAL</option>
		<option <?php if($visitor->subdarshan_type_id==17) echo"selected"; ?> value="17">VASANTHOSTSAVAM(ANNUAL)</option>
		<option <?php if($visitor->subdarshan_type_id==18) echo"selected"; ?> value="18">PADMAVATHI PARINAYAM</option>
		<option <?php if($visitor->subdarshan_type_id==19) echo"selected"; ?> value="19">ABHIDEYAKA ABHISHEKAM</option>
		<option <?php if($visitor->subdarshan_type_id==20) echo"selected"; ?> value="20">PUSHPA PALLAKI</option>
		<option <?php if($visitor->subdarshan_type_id==21) echo"selected"; ?> value="21">PAVITHROTSAVAM</option>
		<option <?php if($visitor->subdarshan_type_id==22) echo"selected"; ?> value="22">PUSHPA YAGAM</option>
		<option <?php if($visitor->subdarshan_type_id==23) echo"selected"; ?> value="23">KALYNOTSAVAM</option>
		<option <?php if($visitor->subdarshan_type_id==24) echo"selected"; ?> value="24">KOLL ALWAR TIRUMANJANAM</option>
	</select>
	                              </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Accomidation Date <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                {{ Form::date('accom_date',date('Y-m-d',strtotime($visitor->accom_date)),array('class' => 'form-control','placeholder'=>'yyyy-mm-dd','required', 'min' =>  date('Y-m-d'))) }} 
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
	                            <?php if(Auth::user()->user_type==1 || Auth::user()->user_type==1){
	                            	$user_type = Auth::user()->user_type;
	                            	?>
	                                <select name="reference1" class="form-control" id="reference" required disabled>
                                    
                                    <option <?php if($user_type==1) echo"selected"; ?> value="MLA">MLA</option>
                                    <option <?php if($user_type==2) echo"selected"; ?> value="MP">MP</option>
                                    <option value="Other">Other</option>
                                    
                                </select>
 
                                <input type="hidden" name="reference" value="<?php echo $user_type; ?>">
	                          <?php  }else{ ?>
	                            	
	                                <select name="reference" class="form-control" id="reference" required>
                                    
                                    <option value="MLA">MLA</option>
                                    <option value="MP">MP</option>
                                    <option value="Other">Other</option>
                                    
                                </select>

	                           <?php  } ?>
	                           
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
	                               <?php  
	                               if(Auth::user()->user_type){
		                               if(Auth::user()->user_type==1 || Auth::user()->user_type==2){$username = Auth::user()->name;}else{ $username = "";}
		                               }
		                            if(Auth::user()->user_type==1 || Auth::user()->user_type==1){?>
		                            <input type="text" name="ref_name1" value="<?php echo $username;?>" class="form-control" disabled>
		                            <input type="hidden" name="ref_name" value="<?php echo $username;?>">
		                          <?php  }else{ ?>
	                                {{ Form::text('ref_name',$visitor->ref_name,array('class' => 'form-control','placeholder'=>'Eg: YV Subbareddy garu','required')) }} 
	                              
	                            <?php  } ?>
	                              @if ($errors->has('ref_name'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('ref_name') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Remarks
	                            </div>
	                            <div class="col-md-9">
	                                
	                                {{ Form::text('remarks',$visitor->remarks,array('class' => 'form-control','placeholder'=>'Remarks')) }} 
	                                @if ($errors->has('remarks'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('remarks') }}</strong>
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
	    <script>
	        $(document).ready(function(){
	           var id = $("#darshan_type").val(); 
	           if(id=="ARJITHA SEAVAS") $("#subdarshanam").prop("disabled",false);
	        });
	    </script>
	    @endsection
	    