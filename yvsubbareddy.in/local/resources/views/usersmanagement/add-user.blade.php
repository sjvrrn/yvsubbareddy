@extends('layouts.app')

@section('content')

<div class="content">
    <style>
    .form-control{
        padding:4px !important;
    }
</style>
<?php
$constituency = array(
                'Achanta','Addanki','Adoni','Allagadda','Alur','Amadalavalasa',    'Amalapuram',
                'Anakapalli','Anantapur','Anaparthy','Araku Valley','Atmakur','Avanigadda',
                'Badvel','Banaganapale','Bapatla','Bhimavaram',    'Bhimli','Bobbli','Chandragiri',
                'Cheepurupalli','Chilakaluripet','Chintalapudi','Chirala','Chittor',
                'Chodavaram','Darsi','Denduluru','Dharmavaram','Dhone','Elamanchili',
                'Eluru','Etcherla',    'Gajapathinagaram',    'Gajuwaka',    'Gangadhara Nellore',
                'Gannavaram','Gannavaram (SC)',    'Giddalur',    'Gopalapuram',    'Gudivada',
                'Gudur','Guntakal',    'Guntur','Guntur','Gurazala','Hindupur','Ichchapuram',
                'Jaggampeta','Jaggayyapeta','Jammalamadugu','Kadapa','Kadiri','Kaikalur',
                'Kakinada City','Kakinada Rural','Kalyandurg','Kamalapuram','Kandukur',
                'Kanigiri',    'Kavali','Kodumur','Kodur',    'Kondapi','Kothapeta','Kovur',
                'Kovvur','Kuppam','Kurnool','Kurupam','Macherla','Machilipatnam','Madakasira',
                'Madanapalle','Madugula','Mandapeta','Mangalagiri',    'Mantralayam','Markapuram',
                'Mummidivaram',    'Mydukur','Mylavaram','Nagari',    'Nandigama','Nandikotkur',
                'Nandyal','Narasannapeta',    'Narasapuram',    'Narasaraopet',    'Narsipatnam',
                'Nellimarla','Nellore City','Nellore Rural','Nidadavole','Nuzvid','Ongole',
                'Paderu','Palacole','Palakonda','Palamaner','Palasa','Pamarru',    'Panyam',
                'Parchur',    'Parvathipuram','Pathapatnam','Pattikonda',    'Payakaraopet',
                'Pedakurapadu',    'Pedana','Peddapuram','Penamaluru',    'Pendurthi','Penukonda',
                'Pileru','Pithapuram','Polavaram','Ponnur',    'Prathipadu','Prathipadu (SC)',
                'Proddatur','Pulivendla','Punganur','Puthalapattu',    'Puttaparthi','Rajahmundry City','Rajam (SC)','Rajampet','Rajamundry Rural','Rajanagaram','Ramachandrapuram',
                'Rampachodavaram','Raptadu','Rayachoti','Rayadurg','Razole','Repalle',
                'Salur','Santhanuthalapadu','Sarvepalli','Sattenapalli','Satyavedu','Singanamala',
                'Srikakulam','Srikalahasti','Srisailam','Srungavarapukota','Sullurpeta',
                'Tadepalligudem','Tadikonda','Tadpatri','Tanuku','Tekkali','Tenali',            'Thamballapalle','Tirupati','Tiruvuru',    'Tuni',    'Udayagiri','Undi',    'Unguturu',
                'Uravakonda','Vemuru','Venkatagiri','Vijayawada','Vijayawada East',            'Vijayawada West',    'Vinukonda Bolla','Visakhapatnam East','Visakhapatnam North',
                'Visakhapatnam South','Visakhapatnam West','Vizianagaram','Yemmiganur',
                'Yerragondapalem'
        );
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
                    <div class="page-container card" style="margin-bottom: 180px;">
	    		<h4 class="abt-title mt-4">Add User</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				<form class="form-horizontal mt-5" method="POST">
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
	    						Mobile <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::text('mobile',null,array('class' => 'form-control','placeholder'=>'Enter Mobile','required')) }}
	    						
	    						@if ($errors->has('mobile'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('mobile') }}</strong>
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
	                        <div class="form-group row mt-2">
	                            <div class="col-md-3">
	                                User Type <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                {{Form::select('user_type', array('1' => 'MLA', '2' => 'MP','3' => 'Others') ,null ,array('class' => 'form-control','required'))}}
                                @if ($errors->has('user_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_type') }}</strong>
                                </span>
                                @endif
	                            </div>
	                        </div>
<div class="form-group row mt-2">
	                            <div class="col-md-3">
	                                Constituency <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                {{Form::select('constituency',$constituency ,null ,array('class' => 'form-control','required'))}}
                                @if ($errors->has('constituency'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('constituency') }}</strong>
                                </span>
                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	    					<div class="col-md-3">
	    						Address <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::textarea('address',null,array('class' => 'form-control','placeholder'=>'Enter Address','required')) }}
	    						
	    						@if ($errors->has('address'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('address') }}</strong>
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