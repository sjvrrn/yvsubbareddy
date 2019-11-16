@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{url('/')}}/assets/bower_components/font-awesome/css/font-awesome.min.css">
<style>
    #actions{
        padding-left:3%;
        padding-right:3%;
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
 <style type="text/css">
    #csd{
          border:3px solid #3c8dbc52;
          border-radius: 2%;
          padding-top: 3%;
          padding-left: 6%;
    }
    #stats{
      margin-bottom:4%;
    }
  </style>
 <section class="content">
     <!-- <div class="row">
        <div class="col-md-3">
          <div class="panel">
            <h4 class="m-2"><b>CATEGORY</b></h4>
            <hr>
            <div class="panel-body">
              <span class="category-list-item"><a href="#">VIP BREAK</a></span>
              <span class="category-list-item"><a href="#">SPECIAL DARSHANAM</a></span>
              <span class="category-list-item"><a href="#">ACCOMIDATION</a></span>
              <span class="category-list-item"><a href="#">SPECIAL SEVAS</a></span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel">
            <h4 class="m-2"><b>STATUS</b></h4>
            <hr>
            <div class="panel-body">
              <span class="category-list-item"><a href="#">ATTENDED</a></span>
              <span class="category-list-item"><a href="#">NON ATTENDED</a></span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel">
            <h4 class="m-2"><b>Category</b></h4>
            <hr>
            <div class="panel-body">
              

            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel">
            <h4 class="m-2"><b>Category</b></h4>
            <hr>
            <div class="panel-body">
              

            </div>
          </div>
        </div>
      </div>-->
      <!--new content-->
      <div class="row" id="stats">
          <h3>Categories</h3>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats"  id="csd">
                <div class="card-header card-header-warning card-header-icon" >
                  <div class="card-icon">
                    <i class="material-icons">Registred</i>
                  </div>
                  <h3 class="card-title">100
                    <small>%</small>
                  </h3>
                </div>
                <div class="card-footer">
               </div>
              </div>
            </div>
           <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats"  id="csd">
                <div class="card-header card-header-warning card-header-icon" >
                  <div class="card-icon">
                    <i class="material-icons">Approved</i>
                  </div>
                  <h3 class="card-title">98%
                    <small>%</small>
                  </h3>
                </div>
                <div class="card-footer">
               </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats"  id="csd">
                <div class="card-header card-header-warning card-header-icon" >
                  <div class="card-icon">
                    <i class="material-icons">Rejected</i>
                  </div>
                  <h3 class="card-title">1
                    <small>%</small>
                  </h3>
                </div>
                <div class="card-footer">
               </div>
              </div>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats"  id="csd">
                <div class="card-header card-header-warning card-header-icon" >
                  <div class="card-icon">
                    <i class="material-icons">Pending</i>
                  </div>
                  <h3 class="card-title">1
                    <small>%</small>
                  </h3>
                </div>
                <div class="card-footer">
               </div>
              </div>
            </div>
          </div>
      <!--end-->
      <!-- row -->
      <div class="row">
        <div class="col-md-8 col-xs-12">
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">CATEGORY WISE VISITORS</h3>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-xs-12">
          <div class="panel">
            <img src="{{url('/')}}/assets/dist/img/ravi.jpeg" width="240" class="img" >
            <div class="panel-body">
              <h4>Ravi Varma</h4>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12 col-md-3">
          
        </div>
        <div class="col-xs-12 col-md-3 mt-2">
          <form action="">
            <input type="text" name="" placeholder="Referal URL" class="form-control">
          </form>
        </div>
        <div class="col-xs-12 col-md-3 mt-2">
          <form action="">
            <input type="Mobile" name="" placeholder="Mobile" class="form-control">
          </form>
        </div>
        <div class="col-xs-12 col-md-3 mt-2">
          <form action="">
            <input type="button" name="" value="send" class="btn btn-success">
          </form>
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
  popupWin.document.write('<html><head><link rel="stylesheet" href="style.css" type="text/css" /><style>@page { size: landscape; }      table{border-collapse:collapse;} table td, table th {border: black 1px solid;vertical-align:top;padding:5px;}th{text-align:left}#example_length,#example_filter,#example_info,#example_paginate,.no-print{display:none;}.print-only, .print-only-table {display:block;}</style></head><body  onload="window.print()">'+  divToPrint.innerHTML +  '</body></html>'); 
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
<script>
  $(function () {
    "use strict";
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: 'VIPBREAK', a: 100},
        {y: 'SPECIALDARSHAN', b: 75 },
        {y: 'ACCOMIDATION', c: 50},
        {y: 'SPECIAL SEVAS', d: 75},
      ],
      barColors: ['#00a65a', '#f56954','#9bbb58', '#23bfaa'],
      xkey: 'y',
      ykeys: ['a', 'b', 'c', 'd'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });
  });
</script>
<!-- <script src="bower_components/jquery-knob/js/jquery.knob.js"></script> -->
<script src="{{url('/')}}/assets/bower_components/morris.js/morris.min.js"></script>
<script src="{{url('/')}}/assets/bower_components/raphael/raphael.min.js"></script>

@endsection
