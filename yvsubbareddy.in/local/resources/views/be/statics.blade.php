
@extends('layouts.app')
<?php
//print_r($visitorCateg);
//print_r($visitorAttan); die;
$count  = array();
$attan  = array();
$attan['pending'] = 0;
 $attan['aprove'] = 0;
 $count['VIP BREAK'] = 0;
 $count['ACCOMIDATION'] = 0;
 $count['SPECIAL DARSHNAM'] = 0;
 $count['SPECIAL SEAVAS'] = 0 ;
 $total_count   = array();
 $total_count['VIP BREAK'] = 0;
 $total_count['ACCOMIDATION'] = 0;
 $total_count['SPECIAL DARSHNAM'] = 0;
 $total_count['SPECIAL SEAVAS'] = 0 ; 
$total_members = 0;
$app_count     = 0;


$x = 1;
//get visitor categoryes
foreach($visitorCateg as $categ){ 
                                $count[$categ->darshan_type] = $categ->count;
                                $total_members += $categ->total;
                                $app_count     += $categ->count;
                                $total_count[$categ->darshan_type] = $categ->total;
                                 $x++; } 
//echo"<pre>"; print_r($visitorAttan);die;
foreach($visitorAttan as $att){ 
                                $attan[$att->status] = $att->count;
                                $x++;} 
 
   $total = $attan['aprove']+$attan['pending']; 
 
?>

@section('content')
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
  
<style>
    #visitors_list{
      background:#ffff !important;
    }
    
  #datatable{
  font-family:serif !important;
  font-size:smaller !important;
  /*float:right;*/
}
#datatable tr td{
  padding: 1px !important;
  font-weight: bolder;
}
#datatable tr th{
  padding: 1px !important;
  font-weight: bolder;
}
.canvasjs-chart-credit{
  display:none;
}
</style>
<div class="content">
    <div class="row"><input type='button' id='print-view' value='Print' onclick='printDiv();' class="btn btn-success"></div>
	<div class="row" id='visitors_list'>
		<div class="col-md-6">
			<div id="visitorsCateg"></div>
			<table id="datatable" border=1>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>NO.OF APPLICATIONS</th>
                    <th>TOTAL NO.OF PERSONS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>VIPBREAK</td>
                    <td><?php echo $count['VIP BREAK']; ?></td>
                    <td><?php echo $total_count['VIP BREAK']; ?></td>
                </tr>

                <tr>
                    <td>SPECIAL DARSANAM</td>
                    <td><?php echo $count['SPECIAL DARSHNAM']; ?></td>
                    <td><?php echo $total_count['SPECIAL DARSHNAM']; ?></td>
                </tr>
                <tr>
                    <td>ACCOMIDATION</td>
                    <td><?php echo $count['ACCOMIDATION']; ?></td>
                    <td><?php echo $total_count['ACCOMIDATION']; ?></td>
                </tr>
                <tr>
                    <td>SPECIAL SEVAS</td>
                    <td><?php echo $count['SPECIAL SEAVAS']; ?></td>
                    <td><?php echo $total_count['SPECIAL SEAVAS']; ?></td>
                    
                </tr>
                <tr>
                    <td>TOTAL</td>
                    <td><?php echo $app_count;?></td>
                    <td><?php echo $total_members; ?></td>
                </tr>
            </tbody>
        </table>
		</div>
		<div class="col-md-3">
		     <div id="visitorsCateg_1" style="height: 200px; width: 350px;"></div>
		</div>
</div>

<!-- visitor attandance -->
<div class="row" id='visitors_list'>
    <div class="col-md-6">
      <div id="visitorAttan"></div>
      <table id="datatable" border=1>
            <thead>
                <tr>
                  <th>STATUS</th>
                  <th>NO.OF VISITORS</th>
                </tr>
            </thead>
            <tbody>
                  <tr>
                    <td>ATTENDED</td>
                    <td><?php echo $attan['pending'];?></td>
                  </tr>
                  <tr>
                    <td>NOT ATTENDED</td>
                    <td><?php echo $attan['aprove'];?></td>
                  </tr>
                </tr>
            </tbody>
      </table>
    </div>
    <div class="col-md-6">
         <div id="visitorAttan_1" style="height: 200px; width: 350px;"></div>
    </div>
</div>
</div>
	    @endsection

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
  <script src="{{URL('/')}}/assets/js/loader.js"></script>
<script type="text/javascript">
 var total   = '<?php echo $total; ?>';
 var pending = '<?php echo $attan['pending'];?>';
 var  aprove = '<?php echo $attan['aprove'];?>';
 var  vipbreak = "<?php echo $count['VIP BREAK']; ?>";
 var ACCOMIDATION = "<?php echo $count['ACCOMIDATION']; ?>";
 var Specialdarsanam = "<?php echo $count['SPECIAL DARSHNAM']; ?>";
 var SPECIALSEAVAS = "<?php echo $count['SPECIAL SEAVAS']; ?>"; 

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(visitorsCateg);
google.charts.setOnLoadCallback(visitorAttan);

// Draw the chart and set the chart values
function visitorsCateg() {
  
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['VIPBREAk', parseInt(vipbreak)],
  ['SPECIAL DARSANAM', parseInt(Specialdarsanam)],
  ['ACCOMIDATION', parseInt(ACCOMIDATION)],
  ['SPECIAL SEAVAS', parseInt(SPECIALSEAVAS)]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'CATEGORY WISE VISITORS ', 'width':450, 'height':200};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('visitorsCateg'));
  chart.draw(data, options);
}

function visitorAttan() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['TOTAL', parseInt(total)],
  ['ATTENDED', parseInt(aprove)],
  ['NOT ATTENDED', parseInt(pending)]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'VISITORS ATTENDANCE', 'width':450, 'height':200};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('visitorAttan'));
  chart.draw(data, options);
}
</script>

<script>
	window.onload = function () {
/*visitor categorise*/
var visitorsCateg = new CanvasJS.Chart("visitorsCateg_1", {
  theme: "light1", // "light2", "dark1", "dark2"
  animationEnabled: false, // change to true    
  title:{
    text: "CATEGORY WISE VISITORS"
  },
  data: [
  {    // Change type to "bar", "area", "spline", "pie",etc.
    type: "column",
    dataPoints: [
      { label: "VIP BREAK",  y: parseInt(vipbreak)  },
      { label: "SPECIAL DARSANAM", y: parseInt(Specialdarsanam)  },
      { label: "ACCOMIDATION", y: parseInt(ACCOMIDATION)  },
      { label: "SPECIAL SEVAS",  y: parseInt(SPECIALSEAVAS)  }
    ]
  }
  ]
});
visitorsCateg.render();

/*visitor attandance*/
var visitorAttan = new CanvasJS.Chart("visitorAttan_1", {
  theme: "light1", // "light2", "dark1", "dark2"
  animationEnabled: false, // change to true    
  title:{
    text: "VISITORS ATTENDANCE"
  },
  data: [
  {    // Change type to "bar", "area", "spline", "pie",etc.
    type: "column",
    dataPoints: [
      { label: "TOTAL",  y: parseInt(total)  },
      { label: "ATTENDED", y: parseInt(aprove)  },
      { label: "NOT ATTENDED",  y: parseInt(pending)  }
    ]
  }
  ]
});
visitorAttan.render();

}

</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
    function printDiv(){
     $('.sidebar1').css('display','none');
     $('.navbar').css('display','none');
      window.print();
     $('.sidebar1').css('display','block');
     $('.navbar').css('display','block');
    }
</script>