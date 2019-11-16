
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
 $count['Special darsanam'] = 0;
 $count['SPECIAL SEAVAS'] = 0 ; ;

$x = 1;
//get visitor categoryes
foreach($visitorCateg as $categ){ 
                                $count[$categ->darshan_type] = $categ->count;
                                 $x++; } 

foreach($visitorAttan as $att){ 
                              
$attan[$att->status] = $att->count;
                                $x++;} 

?>
<!-- <table class="table table-bordered">
    <thead>
      <tr>
        <th>Category Type</th>
        <th>Count</th>
      </tr>
    </thead>
    <tbody>
<?php 

//get visitor categoryes
foreach($visitorCateg as $categ){ 
                                ?>
                              <tr>
                                <td><?php echo $categ->darshan_type; ?></td>  
                                <td><?php echo $categ->count; ?></td>  
                              </tr>
                               <?php  $x++; } ?>
 </tbody>
  </table> 

<table class="table table-bordered">
    <thead>
      <tr>
        <th>Category Type</th>
        <th>Count</th>
      </tr>
    </thead>
    <tbody>
<?php                               
//get attandance 
foreach($visitorAttan as $att){ 
                                ?>
                              <tr>
                                <td><?php echo $att->status; ?></td>  
                                <td><?php echo $att->count; ?></td>  
                              </tr>
                               <?php  $x++;} ?>                
</tbody>
  </table> 
 -->
   <?php  
   $total = $attan['aprove']+$attan['pending']; 
 
?>

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <style>
    #visitors_list{
      background:#ffff !important;
    }

  </style>
<div class="content">
	<div class="row" id='visitors_list'>
		<div class="col-md-6">
			<div id="visitorsCateg"></div>
		</div>
		<div class="col-md-6">
		     <div id="visitorsCateg_1" style="height: 400px; width: 100%;"></div>
		</div>
</div>

<!-- visitor attandance -->
<div class="row" id='visitors_list'>
    <div class="col-md-6">
      <div id="visitorAttan"></div>
    </div>
    <div class="col-md-6">
         <div id="visitorAttan_1" style="height: 400px; width: 100%;"></div>
    </div>
</div>
</div>
	    @endsection

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
  /*Array
(
    [ACCOMIDATION] => 2
    [Special darsanam] => 2
    [SPECIAL SEAVAS] => 3
    [VIP BREAK] => 1
)*/
function visitorsCateg() {
  
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['VIPBREAk', parseInt(vipbreak)],
  ['SPECIAL DARSANAM', parseInt(Specialdarsanam)],
  ['ACCOMIDATION', parseInt(ACCOMIDATION)],
  ['SPECIAL SEAVAS', parseInt(SPECIALSEAVAS)]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'CATEGORY BASE VISITORS ', 'width':500, 'height':400};

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
  var options = {'title':'VISITORS ATTENDANCE', 'width':500, 'height':400};

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
    text: "CATEGORY BASE VISITORS"
  },
  data: [
  {    // Change type to "bar", "area", "spline", "pie",etc.
    type: "column",
    dataPoints: [
      { label: "VIP BREAk",  y: parseInt(vipbreak)  },
      { label: "SPECIAL DARSANAM", y: parseInt(Specialdarsanam)  },
      { label: "ACCOMIDATION", y: parseInt(ACCOMIDATION)  },
      { label: "SPECIAL SEAVAS",  y: parseInt(SPECIALSEAVAS)  }
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