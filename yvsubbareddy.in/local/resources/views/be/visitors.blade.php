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
                                <div style="float:right;width:100%;text-align:right" class="no-print"><input type='button' id='print-view' value='Print' onclick='printDiv();' class="btn btn-error"></div>
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
    	                               {{ Form::date('from_date',$from_date,array('class' => 'form-control','placeholder'=>'yyyy-mm-dd','required')) }} 
    	                                @if ($errors->has('from_date'))
    	    						    <span class="help-block">
    	    						    	<strong>{{ $errors->first('from_date') }}</strong>
    	    					    	</span> 
    	    					    	@endif
    	                            </div>
    	                            <div class="col-md-3">
    	                                To Date <span class="style1">&nbsp;*</span>
    	                                {{ Form::date('to_date',$to_date,array('class' => 'form-control','placeholder'=>'yyyy-mm-dd','required')) }} 
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
    	                        </style>
                                <table id="example" class="display table-responsive" style="width:100%">
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
                                            <th class="no-print">Actions</th>
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
                                         <td><a href="{{ url('edit_registration/' . $visitor->id)}}"  class="update_reg" title="Edit">{{$i+1}}</a></td>
                                         <td>{{$visitor->uid}}</td>
                                        <td>{{$visitor->name}}</td>
                                        <td>{{$visitor->mobile}} </td>
                                        <td>{{$visitor->total_members}}</td>
                                        <td><span style="display:none">{{strtotime($visitor->darshan_date)}}</span> {{date('d-m-Y',strtotime($visitor->darshan_date))}} </td>
                                        <td> {{$visitor->darshan_type}} </td>
                                        <td>{{$subdarshan}}</td>
                                        <td><span style="display:none">{{strtotime($visitor->accom_date)}}</span>  {{date('d-m-Y',strtotime($visitor->accom_date))}}</td>
                                        <td> {{$visitor->reference}}</td>
                                        <td> {{$visitor->ref_name}}</td>
                                         <td> {{$visitor->remarks}}</td>
                                        <td  class="no-print">
                                        <p>
                                        @if($status == 'pending')
                                        <a href="{{ url('visitorstatus/' . $visitor->id . '/aprove')}}"  class="update_status"><img src="{{ url('assets/images/approve.png')}}" alt="Approve" title="Approve"  style="width:20px;" ></a>&nbsp;&nbsp;<a href="{{ url('visitorstatus/' . $visitor->id . '/reject')}}"    class="update_status" ><img src="{{ url('assets/images/reject.png')}}" alt="Reject" title="Reject"  style="width:20px;" >&nbsp;
                                                </a>
                                            
                                            @elseif($status == 'aprove')
                                                @if(Auth::user()->user_type=='3')
                                                <a href="{{ url('visitorstatus/' . $visitor->id . '/confirm')}}"   onclick="return confirm('Are you sure, you want to change the status of #{{$visitor->id}}?')">
                                                    <img src="{{ url('assets/images/confirm.png')}}" alt="Confirm" title="Confirm"  style="width:20px;" >&nbsp;
                                                   </a>&nbsp;&nbsp;
                                                   @endif
                                                <a href="{{ url('visitorstatus/' . $visitor->id . '/reject')}}"    class="update_status">
                                                    <img src="{{ url('assets/images/reject.png')}}" alt="Reject" title="Reject"  style="width:20px;" >&nbsp;
                                                </a>
                                                <!-- <a href="{{ url('/printuser/' . $visitor->id)}}"  id="user-delete" target="_blank">
                                                <img src="{{ url('assets/images/print_user.png')}}" alt="print user" title="printuser"  style="width:20px;" >&nbsp;
                                                </a>-->
                                            @elseif($status == 'reject')
                                            <a href="{{ url('visitorstatus/' . $visitor->id . '/aprove')}}"    class="update_status">
                                                <img src="{{ url('assets/images/approve.png')}}" alt="Approve" title="Approve"  style="width:20px;" >&nbsp;
                                                </a>
                                            
                                            @elseif($status == 'confirm')
                                                {{$visitor->status}}
                                            @elseif($status == 'all')
                                              {{$visitor->status}}  
                                            @else
                                            @endif
                                            </p>
                                             
                                        </td>    
                                    </tr>

                                    <!--div class="card">
                                        <div class="card-body ml-4">
                                            <p><strong>Name: </strong> {{$visitor->name}} </p>
                                            <p><strong>Mobile: </strong> {{$visitor->mobile}} </p>
                                            <p><strong>Total Number: </strong> {{$visitor->total_members}} </p>
                                            <p><strong>Darshan Date: </strong> {{$visitor->darshan_date}} </p>
                                            <p><strong>Darshan Type: </strong> {{$visitor->darshan_type}} </p>
                                            <p><strong>Accomidation Date: </strong> {{$visitor->accom_date}} </p>
                                            <p><strong>Reference: </strong> {{$visitor->reference}} </p>
                                            <p><strong>Reference Name: </strong> {{$visitor->ref_name}} </p>
                                            @if($status == 'pending')
                                           
                                            <p><a href="{{ url('visitorstatus/ ' . $visitor->id . '/aprove')}}" class="btn btn-success">Approve&nbsp;
                                                <i class="fas fa-edit"></i></a>
                                                <a href="{{ url('visitorstatus/ ' . $visitor->id . '/reject')}}" class="btn btn-danger">Reject&nbsp;
                                                <i class="fas fa-delete"></i></a>
                                            </p>
                                            @elseif($status == 'aprove')
                                            <p><a href="{{ url('visitorstatus/ ' . $visitor->id . '/confirm')}}" class="btn btn-success">Conform&nbsp;
                                                <i class="fas fa-edit"></i></a>
                                                <a href="{{ url('visitorstatus/ ' . $visitor->id . '/reject')}}" class="btn btn-danger">Reject&nbsp;
                                                <i class="fas fa-delete"></i></a>
                                            </p>
                                            @elseif($status == 'reject')
                                            <p><a href="{{ url('visitorstatus/ ' . $visitor->id . '/aprove')}}" class="btn btn-success">Approve&nbsp;
                                                <i class="fas fa-edit"></i></a>
                                            </p>
                                            @elseif($status == 'confirm')
                                            <!-- <p><a href="#" class="btn btn-success">Conform&nbsp;
                                                <i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger">Reject&nbsp;
                                                <i class="fas fa-delete"></i></a>
                                            </p> 
                                            @else
                                            @endif
                                        </div>
                                    </div-->
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

$(".update_status").click(function(e){
     var remarks = prompt("Please enter if any remarks (optional)", "");
    e.preventDefault();
    var href = $(this).attr("href")+'/'+remarks;
    window.location = href;
});

$(document).ready(function() {
    $('#example').DataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aaSorting": [[ 8, 'asc' ]],
			"iDisplayLength": 25

		});
} );

</script>                
@endsection
