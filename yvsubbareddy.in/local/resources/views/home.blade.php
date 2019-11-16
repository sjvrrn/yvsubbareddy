@extends('layouts.app')

@section('content')
<style>
    #actions{
        padding-left:3%;
        padding-right:3%;
    }
</style>
<?php 

if(isset($_POST['data'])){

    //use \;
    $data = json_decode($_POST['data']);
    foreach($data as $item){   
        if($item!=""){ 
           App\Http\Controllers\VisitorController::statusUp($item,'aprove','mulitiple Remarks');
        }
    }
}
?>
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
        <div class="row"> 
        <!-- mla list-->
        @if(Auth::user()->user_type==3)
    <div class="col-md-3">
        <!-- side bar start -->
<input type="text" class="form-control col-md-12" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<ul id="myUL" class="list-group">
    <?php  $i=1;foreach($mla as $ml){ if($i==1)$class="active"; else $class=""; $name = $ml->ref_name;  ?>
  <li class="list-group-item <?php echo $class;?>"><a href="#" class="search" data-name="<?php echo $name;?>"><?php echo $name;?></a></li>
<?php  $i++;} ?>
 
</ul>
        <!-- side bar end -->
    </div>
<div class="col-md-9">
    @endif
        <!--end-->
             <div class="govt-section" ng-show="govtShow">
        <div class="row">
            <div style="float:right;width:100%;text-align:right" class="no-print"><input type='button' id='print-view' value='Print' onclick='printDiv();' class="btn btn-error"></div>
            <div  id="DivIdToPrint">
            <h3>{{$title}}</h3>
            <div class="col-md-12 col-xs-12 col-sm-12 mt-2 table-responsive">
            <div  class="print-only">
                <div class="form-group row" style ="font-weight:bold;">
                <div style="float:left;width:50%">From Date : {{date('d-m-Y', strtotime($from_date)) }}</div>
                <div style="float:left;width:50%">To Date :{{date('d-m-Y', strtotime($to_date)) }}</div>
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
                <?php if(Auth::user()->user_type==3) $to_date = date('Y-m-d',strtotime('+ 1 day'));?>
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
        <!--new ajax approve-->
          <div class="form-group row">
            <div class="col-md-3"><button id="vdelete" name="delete" class="btn btn-success">APPROVE</button></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <script>
                $(document).ready(function(){
                    $(document).on('click','#vdelete',function(){
                        var arr = []; var x = 1;
                          $('#udelete:checked').each(function(){   
                                arr[x] = $(this).val();
                                x++;
                            });
                          
                          var ajax_url = '<?php echo url('/homelist');?>';
                          $.ajax({

                            type:'POST',
                            url:ajax_url,
                            data:{
                                    "_token": "{{ csrf_token() }}",
                                    "data":JSON.stringify(arr) },
                            success:function(data){
                                alert('Status Updated Success');
                            },

                          });
                   //window.location.href= ajax_url;
                  jQuery("body").load(window.location.href=ajax_url);
                    });
                });
            </script>
        </div>
        <!--end-->
                <table id="example" class="display table table-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>APPROVE</th>
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
                                            <?php if(Auth::user()->user_type==3){
												echo"<td>Constituency</td>";
											}?>
                                            <th>Remarks</th>
                                            <th id="actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($visitors))
                                    @foreach($visitors as $i=>$visitor)
                                     <?php
                                      $subdarshan_types = array('','SUPRABHATHAM','THOMALA SEVA','ARCHANA','KALYNOTSAVAM','ARJITHA BRAHMOTSAVAM','DOLOTSAVAM','VASANTHOTSAVAM','SAHASRA DEEPALANKARA SEVA',
                                      'VISESHA POOJA','ASTADALAPADA PADMARADHANA','SAHASRAKALASHABHISHEKAM','TIRUPPAVADA','VASTRALANKA SEVA','POORABHISHEKAM','NIJAPADA DARSHANAM','FLOAT FESTIVAL',
                                      'VASANTHOSTSAVAM(ANNUAL)','PADMAVATHI PARINAYAM','ABHIDEYAKA ABHISHEKAM','PUSHPA PALLAKI','PAVITHROTSAVAM','PAVITHROTSAVAM','PUSHPA YAGAM','KALYNOTSAVAM',
                                      'KOLL ALWAR TIRUMANJANAM');
                                      /*constituencies*/
								   $constituencies =  array(
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
                'Yerragondapalem',
        'Araku','Srikakulam','Vizianagaram','Visakhapatnam','Anakapalli','Kakinada','Amalapuram',
                'Rajahmundry','Narasapuram','Eluru','Machilipatnam','Vijayawada','Guntur','Narasaraopet','Bapatla','Ongole','Nandyal','Kurnool','Anantapur','Hindupur','Kadapa','Nellore','Tirupati','Rajampet','Chittoor'
        );
                                      $sub = (int)$visitor->subdarshan_type_id; 
                                      if($sub>0 && $sub!="")
                                       $subdarshan =  $subdarshan_types[$sub];
                                     else
                                       $subdarshan = '-';
                                     ?>
                                    <tr>
                                        <td><input id="udelete" type="checkbox" name="dest[]" value="{{$visitor->id}}"></td>
                                        <td><a href="{{ url('edit_registration/' . $visitor->id)}}"  class="update_reg" title="Edit">{{$i+1}}</a></td>
                                        <td>{{$visitor->uid}}</td>
                                        <td>{{$visitor->name}}</td>
                                        <td>{{$visitor->mobile}} </td>
                                        <td>{{$visitor->total_members}}</td>
                                        <td><span style="display:none">{{strtotime($visitor->darshan_date)}}</span> {{date('d-m-Y',strtotime($visitor->darshan_date))}} </td>
                                        <td> {{$visitor->darshan_type}} </td>
                                        <td title='<?php echo $visitor->subdarshan_type_id; ?>'>{{$subdarshan}}</td>
                                        <td ><span style="display:none">{{strtotime($visitor->accom_date)}}</span> {{date('d-m-Y',strtotime($visitor->accom_date))}}</td>
                                        <td> {{$visitor->reference}}</td>
                                        <td> {{$visitor->ref_name}}</td>
                                        <?php if(Auth::user()->user_type==3){
											$constituency = $constituencies[$visitor->cons];
											//$constituency ="";
												echo"<td>".$constituency."</td>";
											}?>
                                        <td> {{$visitor->remarks}}</td>
                                        <td style="text-align:center;">
                                            <p>
                                              
                                                @if(isset(Auth::user()->user_type) && (Auth::user()->user_type == 'admin' || Auth::user()->user_type == '3' || Auth::user()->user_type == '1' || Auth::user()->user_type == '2'))
                                                   
                                                   @if( Auth::user()->user_type != '1' && Auth::user()->user_type != '2')
                                                   <!-- <a href="{{ url('visitorstatus/' . $visitor->id . '/aprove')}}"  class="update_status">
                                                    <img src="{{ url('assets/images/approve.png')}}" alt="Approve" title="Approve"  style="width:20px;" >&nbsp;
                                                    </a>&nbsp;&nbsp;
                                                    <a href="{{ url('visitorstatus/' . $visitor->id . '/reject')}}"   class="update_status">
                                                    <img src="{{ url('assets/images/reject.png')}}" alt="Reject" title="Reject"  style="width:20px;" >&nbsp;
                                                    </a>-->
                                                     <a href="{{ url('visitorstatus/' . $visitor->id . '/aprove')}}" class="add update_status" title="approve" data-toggle="tooltip"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                     <a  href="{{ url('visitorstatus/' . $visitor->id . '/reject')}}" class="edit update_status" title="reject" data-toggle="tooltip"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                                     <a  href="{{ url('visitordelete/' . $visitor->id)}}" class="delete" title="Delete" data-toggle="tooltip" id="user-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                  
                                                   @else
                                                   <a  href="{{ url('visitordelete/' . $visitor->id)}}" class="delete" title="Delete" data-toggle="tooltip" id="user-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                  @endif
                                                @else
                                                     
                                                   @if((Auth::user()->user_type !== '2') && Auth::user()->user_type !== '1')
                                                    <a href="{{ url('staffstatus/' . $visitor->id . '/confirm')}}"   onclick="return confirm('Are you sure, you want to change the status of {{$visitor->name}}?')">
                                                    <img src="{{ url('assets/images/confirm.png')}}" alt="Confirm" title="Confirm"  style="width:20px;" >&nbsp;
                                                   </a>
                                                   <!--<a  href="{{ url('staffstatus/' . $visitor->id . '/confirm')}}" title="Delete" data-toggle="tooltip"  onclick="return confirm('Are you sure, you want to change the status of {{$visitor->name}}?')"><i class="fa fa-check-circle" aria-hidden="true"></i></a>-->
                                                @endif
                                            @endif
                                            </p>
                                        </td>    
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
        @if(Auth::user()->user_type==3)
                </div>
                @endif
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
     var remarks = prompt("Please enter if any remarks  (optional)", "");
    e.preventDefault();
    var href = $(this).attr("href")+'/'+remarks;
    window.location = href;
});

$(document).ready(function() {
    $('#example').DataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
             @if(isset(Auth::user()->user_type) && Auth::user()->user_type == 'admin')
			"aaSorting": [[ 8, 'asc' ]],
	        @else
			"aaSorting": [[ 1, 'asc' ]],
	    	@endif
			"iDisplayLength": 100

		});
//delete user confirmation
  $(document).on('click','#user-delete',function(){

                var x = confirm("Are you sure you want to delete?");
                  if (x)
                      return true;
                  else
                    return false;
});
} );
 /*
   *mlasearch
   */
    $(document).on('click','.search',function(){
            var name = $(this).data('name');
           /*table search*/
           var table = $('#example').DataTable();
           table.columns(10)
               .search(name)
               .draw();
           /*end*/ 
        });
/*
 *mla selection
 */
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>                

@endsection
