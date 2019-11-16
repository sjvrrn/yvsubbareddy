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
                            <div class="govt-section" ng-show="govtShow">
                            <div class="row">
                                <div style="float:right;width:100%;text-align:right" class="no-print">
                                    <input type='button' id='print-view' value='Print' onclick='printDiv();' class="btn btn-error">
                                </div>
                                <div  id="DivIdToPrint">

                                <h3>{{ucwords($status)}} List</h3>
                                <div class="col-md-12 col-xs-12 col-sm-12 mt-2 table-responsive">
                                <div  class="print-only">
                                    <div class="form-group row" style ="font-weight:bold;">
        	                            <div style="float:left;width:50%">
        	                                From Date : {{date('d-m-Y', strtotime($from_date)) }}
        	                                
        	                            </div>
        	                            <div  style="float:left;width:50%">
        	                                To Date :{{date('d-m-Y', strtotime($to_date)) }}
        	                            </div>
    	                            </div>
                                </div>
                  
                                <div  class="no-print">

                                    {{ Form::open(array('class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
    	    				     <div class="form-group row">
    	                            <div class="col-md-3">
    	                                From Date <span class="style1">&nbsp;*</span>
    	                               {{ Form::date('from_date',$from_date,array('class' => 'form-control','placeholder'=>'yyyy-mm-dd','required', 'min' =>  date('Y-m-d'))) }} 
    	                                @if ($errors->has('from_date'))
    	    						    <span class="help-block">
    	    						    	<strong>{{ $errors->first('from_date') }}</strong>
    	    					    	</span> 
    	    					    	@endif
    	                            </div>
    	                            <div class="col-md-3">
    	                                To Date <span class="style1">&nbsp;*</span>
    	                                {{ Form::date('to_date',$to_date,array('class' => 'form-control','placeholder'=>'yyyy-mm-dd','required', 'min' =>  date('Y-m-d'))) }} 
    	                                @if ($errors->has('to_date'))
    	    					    	<span class="help-block">
    	    							    <strong>{{ $errors->first('to_date') }}</strong>
    	    					    	</span> 
    	    					    	@endif
    	                            </div>
    	                            <div class="col-md-3"> 
    	                                 {{ Form::token() }}
    	                                <input id="input-submit" value="Submit" type="submit" class="btn btn-success">
    	                            </div>
    	                        </div>
    	                        {{ Form::close() }}
    	                        </div>
    	                         <style>
    	                            <style>
                                    table {
                                      border-collapse: collapse;
                                      border-spacing: 0;
                                      width: 100%;
                                      border: 1px solid #ddd;
                                    }
                                    
                                    th, td {
                                      text-align: left;
                                      padding: 8px;
                                    }
                                    
                                    tr:nth-child(even){background-color: #f2f2f2}
                                    </style>
                                <table id="example" class="display table table-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Total Number</th>
                                            <th>Darshan Date</th>
                                            <th>Darshan Type</th>
                                            <th>SubDarshan Type</th>
                                            <th>Accomidation Date</th>
                                            <th>Reference</th>
                                            <th>Reference Name</th>
                                            <th>Remarks</th>
                                           @if($status=='aprove') <th>Actions</th> @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                               
           
                                    @if(!empty($visitors))
                                    @foreach($visitors as $i=>$visitor)
                                    <?php 
                                      $subdarshan_types = array('','SUPRABHATHAM','THOMALA SEVA','ARCHANA','KALYNOTSAVAM','ARJITHA BRAHMOTSAVAM','DOLOTSAVAM','VASANTHOTSAVAM','SAHASRA DEEPALANKARA SEVA','VISESHA POOJA','ASTADALAPADA PADMARADHANA','SAHASRAKALASHABHISHEKAM','TIRUPPAVADA','VASTRALANKA SEVA','POORABHISHEKAM','NIJAPADA DARSHANAM','FLOAT FESTIVAL','VASANTHOSTSAVAM(ANNUAL)','PADMAVATHI PARINAYAM','ABHIDEYAKA ABHISHEKAM','PUSHPA PALLAKI','PAVITHROTSAVAM','PAVITHROTSAVAM','PUSHPA YAGAM','KALYNOTSAVAM','KOLL ALWAR TIRUMANJANAM'); 
                                     $sub = (int)$visitor->subdarshan_type_id; 
                                      if($sub>0 && $sub!="")
                                       $subdarshan =  $subdarshan_types[$sub];
                                     else
                                       $subdarshan = '-';
                                     ?>
                                     <tr>
                                         <td>{{$i+1}}</td>
                                         <td>{{$visitor->uid}}</td>
                                        <td>{{$visitor->name}}</td>
                                        <td>{{$visitor->mobile}} </td>
                                        <td>{{$visitor->total_members}}</td>
                                        <td><span style="display:none">{{strtotime($visitor->darshan_date)}}</span> {{date('d-m-Y',strtotime($visitor->darshan_date))}} </td>
                                        <td> {{$visitor->darshan_type}} </td>
                                        <td> {{$subdarshan}} </td>
                                        <td><span style="display:none">{{strtotime($visitor->accom_date)}}</span>  {{date('d-m-Y',strtotime($visitor->accom_date))}}</td>
                                        <td> {{$visitor->reference}}</td>
                                        <td> {{$visitor->ref_name}}</td>
                                        <td> {{$visitor->remarks}}</td>
                                         @if($status=='aprove') 
                                            <td>
                                            <p><a href="{{ url('staffstatus/' . $visitor->id . '/confirm')}}"   onclick="return confirm('Are you sure, you want to change the status of {{$visitor->name}}?')">
                                                <img src="{{ url('assets/images/confirm.png')}}" alt="Confirm" title="Confirm"  style="width:20px;" >&nbsp;
                                               </a>
                                            </p>
                                            </td>    
                                        @endif
                                    </tr>
                                      
                                    @endforeach
                                    @endif
                                    
                                </tbody>
                               
                                </table>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
function printDiv(){
	var divToPrint = document.getElementById('DivIdToPrint');
	var popupWin = window.open('', '_blank', 'width=900,height=700,scrollbars=1,resizable=1');
	popupWin.document.open();
	popupWin.document.write('<html><head><link rel="stylesheet" href="style.css" type="text/css" /><style>@page { size: landscape; }			table{border-collapse:collapse;} table td, table th {border: black 1px solid;vertical-align:top;padding:5px;}th{text-align:left}#example_length,#example_filter,#example_info,#example_paginate,.no-print{display:none;}.print-only, .print-only-table {display:block;}</style></head><body  onload="window.print()">'+  divToPrint.innerHTML +  '</body></html>'); 
	popupWin.document.close();
			
}	

$(document).ready(function() {
    $('#example').DataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aaSorting": [[ 1, 'asc' ]],
			"iDisplayLength": 100

		});
} );

</script>                
@endsection
