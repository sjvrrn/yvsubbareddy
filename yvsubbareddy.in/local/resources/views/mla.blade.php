@extends('layouts.app')

@section('content')
<style>
    #actions{
        padding-left:3%;
        padding-right:3%;
    }
.slist{
    font-family:serif;
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

        <div class="row">
@if(Auth::user()->user_type==3)
    <div class="col-md-3">
        <!-- side bar start -->
<input type="text" class="form-control col-md-12" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." autocomplete="off">

<ul id="myUL" class="list-group">
    <?php  $i=1;foreach($mla as $ml){ if($i==1)$class="active"; else $class=""; $name = $ml->ref_name;  ?>
  <li class="list-group-item <?php echo $class;?>"><a href="#" class="search" data-name="<?php echo $name;?>"><?php echo $name;?></a></li>
<?php  $i++;} ?>
 
</ul>
        <!-- side bar end -->
    </div>
<div class="col-md-9">
    @endif
        <div class="govt-section" ng-show="govtShow">
        <div class="row">
<!-- new ennhc start -->
<section class="content">
      <div class="container-fluid">
         <div class="row">
           <div class="col-md-8 col-sm-12 col-xs-12">
             <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="{{url('/')}}/assets/dist/img/01.jpeg" alt="" width="100%">
                  </div>

                  <div class="item">
                    <img src="{{url('/')}}/assets/dist/img/03.jpg" alt="" width="100%">
                  </div>

                  <div class="item">
                    <img src="{{url('/')}}/assets/dist/img/01.jpeg" alt="" width="100%">
                  </div>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
           </div>
           <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="panel">
              <div class="panel-body mla-list-box slist">
                <ul>
                  <li><a href="#">Settings</a></li>
                  <li><a href="#">Mailing</a></li>
                  <li><a href="#">Suggestion</a></li>
                  <li><a href="#">Inbox</a></li>
                </ul>
              </div>
            </div>
          </div>
         </div>
         <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="panel mt-2">
              <h3 class="ml-4 mt-2">Stastics</h3>
              <hr>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="">
                    <h6 class="text-center">Visitors Attendence</h6>
                    <div class="mt-2 mb-2 text-center">
                      <div class="sparkline" data-type="pie" data-offset="90" data-width="100px" data-height="100px">
                        6,4
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="list-cat">
                      <ul class="text-center">
                        <li><span class="dot"></span>&nbsp;&nbsp;TOTAL</li>
                        <li><span class="dot1"></span>&nbsp;&nbsp;ATTENDED</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="">
                    <h6 class="text-center">Category Wise Visitors</h6>
                    <div class="mt-2 mb-2 text-center">
                      <div class="sparkline" data-type="pie" data-offset="90" data-width="100px" data-height="100px">
                        6,4,8,6
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="list-cat">
                      <ul>
                        <li><span class="dot"></span>&nbsp;&nbsp;VIP BREAK</li>
                        <li><span class="dot1"></span>&nbsp;&nbsp;SPECIAL DARSHANAM</li>
                        <li><span class="dot2"></span>&nbsp;&nbsp;&nbsp;ACCOMIDATION</li>
                        <li><span class="dot3"></span>&nbsp;&nbsp;SPECIAL SEVAS</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
             <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="container-box panel mt-2">
              <h3 class="text-center">Calendar</h3>
                 <!-- THE CALENDAR -->
                <!-- <div id='calendar'></div> -->
                <img  class="img img-responsive" src="{{url('/')}}/assets/dist/img/calendar.jpg">
              </div>
            </div>
         </div>
      </div>
    </section>
<!-- enhc end -->
                            </div>
                        </div>
                @if(Auth::user()->user_type==3)
                </div>
                @endif
            </div>
        </div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!--enhc start-->
  <link rel="stylesheet" href="{{url('/')}}/assets/dist/css/style.css">
  <link rel="stylesheet" href="{{url('/')}}/assets/dist/css/style1.css">
  <link rel="stylesheet" href="{{url('/')}}/assets/dist/css/skins/_all-skins.min.css">
  
<!--end-->
<!-- encscript start -->
<script src="{{url('/')}}/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- FastClick -->
<script src="{{url('/')}}/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<!--<script src="{{url('/')}}/assets/dist/js/adminlte.min.js"></script>-->
<!-- Sparkline -->
<script src="{{url('/')}}/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="{{url('/')}}/assets/dist/js/jquery.sparkline.min.js"></script>
<script src="{{url('/')}}/assets/bower_components/moment/moment.js"></script>
<!-- Pie charts -->
<script>
  $(".sparkline").each(function () {
    var $this = $(this);
    $this.sparkline('html', $this.data());
  });

</script>

<!-- encscript end -->
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
      $('#myCarousel').carousel();
    $('#example').DataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
             @if(isset(Auth::user()->user_type) && Auth::user()->user_type == 'admin')
			"aaSorting": [[ 7, 'asc' ]],
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
  /*
   *mlasearch
   */
    $(document).on('click','.search',function(){
            var name = $(this).data('name');
           /*table search*/
           var table = $('#example').DataTable();
           table.columns(9)
               .search(name)
               .draw();
           /*end*/ 
        });
} );

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
