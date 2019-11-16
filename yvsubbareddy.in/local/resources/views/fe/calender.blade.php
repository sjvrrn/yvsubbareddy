@extends('layouts.app')

@section('content')
<?php 
$last = date('t');
?>
<!-- <script  src="https://code.jquery.com/qunit/qunit-2.9.2.js"  integrity="sha256-EQ5rv6kPFPKQUYY+P4H6fm/le+yFRLVAb//2PfBswfE="  crossorigin="anonymous"></script> -->
<script>
$(document).ready(function(){ 
		
});

</script>
<div class="content">
	<style>
		.form-control{
			padding:0px !important;
		}
	</style>
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

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    			<!-- calender start -->  
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{URL('/')}}/assets/aicon/calenderstyle.css">
<link rel="stylesheet" href="{{URL('/')}}/assets/css/jquery-pseudo-ripple.css">
  <link rel="stylesheet" href="{{URL('/')}}/assets/css/jquery-nao-calendar.css">
  <style>
    .container-box {max-width: 480px; background-color: #fafafa; }
    .myCalendar.nao-month td {
        padding: 15px;
      }
      .myCalendar .month-head>div,
      .myCalendar .month-head>button {
        padding: 15px;
      }
      .text-center{
        text-align: center;
      }
/*
 *custom styles
 */
   <style>
    body { font-family: 'Roboto'; background-color: #fafafa;}
    .container { margin: 150px auto; max-width: 480px; }
    .myCalendar.nao-month td {
      padding: 15px;
    }
    .myCalendar .month-head>div,
    .myCalendar .month-head>button {
      padding: 15px;
    }
    .myCalendar.nao-month td{
          border: 1px solid #ffff;
    }
    .nao-month th,td{
          background-color: #b22f30;
          color: white;
    }
    .nao-month td a{
          color: #081605;
    }
    .nao-month .month-head{

          background-color: #65a465;
    }
    .month-head{
      padding: 26px;
        color: #ffff;
    }
    #jquery-script-menu{
      display:none;
    }
  </style>

  </style>
  <div class="container-box">
    <h4 class="text-center">Calendar</h4>
    <div class="myCalendar"></div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
  <script src="{{URL('/')}}/assets/js/jquery-pseudo-ripple.js"></script>
  <script src="{{URL('/')}}/assets/js/jquery-nao-calendar.js"></script>
  <script>
  $(document).ready(function(){
  console.log(new Date());
  })
    $('.myCalendar').calendar({
      date: new Date(), 
      autoSelect: false, // false by default
      select: function(date) {
        console.log('SELECT', date)
      },
      toggle: function(y, m) {
        console.log('TOGGLE', y, m)
        $.ajax({
               type:'POST',
               url:'{{route('user.monthdata')}}',
               data:'_token={{ csrf_token() }}&month='+m+'&year='+y,
               success:function(data) {
                var str = data;
                var jArray = str.split(',').map(function(item) { return parseInt(item, 10);});
                var last = '<?php echo $last;?>';
                for(var i=0;i<=last;i++){
                    if(jArray.includes(i)){
                      $("#"+i).css('background-color','#f51212d1');
                    }else{
                      d = i;
                      if(i<10) d = '0'+i; 
                      var date = y+'/'+m+'/'+d;
                      $("#"+i).css('background-color','rgb(101, 164, 101)');
                      $("#"+i).html('<a href="uregister/'+date+'">'+i+'<i class="fas fa-user-plus"></i></a>');
                    }
                }
               },
            });
      }
    
    })
  </script>

	    			<!-- calender end -->
	    			</div>
	    			
	    		</div>
	    	</div>
	    </div>
	    @endsection

	