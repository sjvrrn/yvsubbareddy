 <?php /*stdClass Object ( [id] => 631 [name] => testing purpose [mobile] => 534535dfdsf [total_members] => 90 [darshan_date] => 2019-10-29 00:00:00 
 [darshan_type] => speical [accom_date] => 2019-09-26 00:00:00 [reference] => MP [ref_name] => testing [status] => aprove [created_at] => 2019-09-22 09:00:44
 [updated_at] => 2019-09-24 00:48:22 [staffstatus] => [remarks] => no )*/ ?>
 <?php
$printData = Session::get('printData'); 
$data = $printData[0];
 extract($data); 
$constituences =array(
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
        //echo $constituency; die;
$constituency = $constituences[$constituency]; 
?>
<!DOCTYPE html>
<html>
   <head>
	<title>TTD Letter Head</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <style>
.page-container{     /* padding-left: 19% !important;
                        padding-right: 19% !important;*/
                        font-family: serif !important;
                 }
   #textID{
          text-align: justify;
       /*   padding-left: 12%;
          padding-right: 17%;*/
        }  
#stext{
        font-family: sans-serif;
        color: #dc5d5d;
        font-weight: 550;
}        
</style>
    </head>
    <body>
        <!-- Body Content starts -->
        <div class="container-fluid" id='DivIdToPrint'>
           <div class="page-container">
	           	<div class="row">
                    <div class="col-md-3 col-xs-12 col-sm-12 mt-2">
                         <div style="float:right;width:100%;text-align:right" class="no-print" >
                          <input type="button" id="sendurl" value="sendurl" class="btn btn-success"  data-toggle="modal" data-target="#myModal">
                          <input type='button' id='print-view' value='Print' onclick='window.print();' class="btn btn-success">
                                    <!-- <input type='button' id='print-view' value='Print' onclick='printDiv();' class="btn btn-success"> -->
                                </div> 
                    </div> 
                     <div class=" col-md-3 col-xs-12 col-sm-12 mt-2" id="stext" >
                      <?php echo Auth::user()->name.'<br>';
                                if($user_type==1) 
                                  $status ="Member of the Legislative Assembly.";
                                else 
                                $status ="member of parliament";

                                echo $status.'<br>';
                                echo $constituency.'<br>';
                                 ?>
                        
                    </div>
                    <div class="col-md-1 col-xs-12 col-sm-12 mt-2">
                        <img class="img img-reponsive" src="{{url('/')}}/assets/images/satyamevajayathe.png"/>
                        <div class="col-md-2 col-xs-12 col-sm-12 mt-2"></div>
                    </div>
                     <div class="col-md-3 col-xs-12 col-sm-12 mt-2" style="padding-left:8%" id="stext">
                        <?php /*echo'<i class="fa fa-address-card"></i>:'. */echo $address.'<br>';
                        /*echo '<i class="fas fa-envelope"></i>:'*/echo $email.'<br>';
                        /*'<i class="fa fa-mobile" ></i>:'*/echo $mobile; 
?>
                    </div>
                   </div>
              <div class="row">
	           	     <!-- Adds Start -->
                    <div class="col-md-3 col-xs-12 col-sm-12 mt-2">
                        
                    </div>
                    <!-- Adds End -->
	           		<div class="col-md-6 col-xs-12 col-sm-8" id="textID">
					   <div class="d-flex justify-content-between">
                           <p>Ref:RR/TTD/<?php echo $id?></p>
                           <p>Date:<?php echo date('d-m-Y');?></p>
                       </div>
                       <span class="d-block">To</span> 
                       <span class="d-block"><b>The Joint Executive Officer,</b></span>
                       <span class="d-block">Tirumala Tirupathi Devasthanam,</span>
                       <span class="d-block">TIRUMALA.</span>
                       <p class="mt-4">Dear Sir,</p>
                       <p>Sri <b><?php echo $name;?></b> is arriving Tirumala on <b><?php echo $accom_date;?></b>along with his family consisting of <b>(<?php echo $total_members; ?>)</b> members to worship <b>LORD VENKATESHWARA SWAMY VARU</b> and they will stay for One Day. </p>
                       <p>I request you to provide <b>Good</b> accommodation (A.C.Rooms) for One Day i.e. on <b><?php echo $accom_date;?></b> necessary arrangements of <b>(<?php echo $total_members; ?>)</b> tickets <b><?php echo $darshan_type;?></b> on <b><?php echo $darshan_date;?></b> on usual terms and conditions.</p>

                       <p>Thank you,</p>
                       <p>With Regards</p>
                       <p><b>(<?php echo Auth::user()->name; ?>)</b></p>
                       <p>Note: Please Produce this letter along with ID Proofs, at the JEO Office on the day of arrival before 12:00 Noon</p>
        	        </div>
        	        <!-- Adds Start -->
					<div class="col-md-3 col-xs-12 col-sm-12 mt-2">
						
					</div>
					<!-- Adds End -->
	           	</div>
        	    
           </div>
        </div>
        <!-- Body Content starts -->
        
        <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/angular.js"></script>
		<script src="assets/js/custom.js"></script>
		 <script>
      function printDiv(){
  var divToPrint = document.getElementById('DivIdToPrint');
  var popupWin = window.open('', '_blank', 'width=900,height=700,scrollbars=1,resizable=1');
  popupWin.document.open();
  popupWin.document.write('<html><head><link rel="stylesheet" href="style.css" type="text/css" /><style>@page { size: landscape; }      table{border-collapse:collapse;} table td, table th {border: black 1px solid;vertical-align:top;padding:5px;}th{text-align:left}#example_length,#example_filter,#example_info,#example_paginate,.no-print{display:none;}.print-only, .print-only-table {display:block;}</style></head><body  onload="window.print()">'+  divToPrint.innerHTML +  '</body></html>'); 
  popupWin.document.close();
      
} 
    </script>
	</body>
</html>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <!-- send sms start-->
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
        <div class="page-container card">
          <h4 class="abt-title mt-4 url">Share LetterHead URL</h4>
          <div class="row">

            <div class="col-md-8 col-xs-12 col-sm-12">
              <!-- <form action="" class="mt-5" name="myForm">  -->
              {{ Form::open(array('route' => 'user.shareletter','class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
            
                         <div class="form-group row">
                              <div class="col-md-3 url control-label" >URL:</div>
                              <div class="col-md-9"> 
                                 <input type='text' class="form-control" name='url' value="{{url('/')}}/printletter/{{$uid}}" class='url' id="url"/>
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
       <!-- end -->
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- end -->