<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piechart";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$perquery = mysqli_query($conn, "SELECT *, (SUM(`hours`)* 100 / (SELECT SUM(hours) FROM `pieinfo`)) AS `percent` FROM `pieinfo` GROUP BY `dataid`");





$add_rows = '';
while ($row = mysqli_fetch_assoc($perquery)) {


    $add_rows .= 'data.addRow(["' . 
    $row['activity'] . 
    "  " . 
    $row['hours'] . 
    " hours " . 
    number_format((float)$row['percent'], 2, '.', '')  . 
    "%" . 
    '", ' . 
    $row['hours'] . 
    ']);';


};
?>

<!DOCTYPE html>
<html>
<head>

	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <style type="text/css">
    	.span1{
    		border:1px red solid;
    		height:100px;
    	}
    	.span3{
    		border:1px blue solid;
    		height:100px;
    	}
    	.span6{
    		border: 1px orange solid;
    		height:100px;
    	}
    	.span12{
    		border:1px green solid;
	   		height:100px;
    	}
    </style>

	<script type="text/javascript" >
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {



     	var data = new google.visualization.DataTable();

      	data.addColumn('string', 'time');
      	data.addColumn('number', 'hours');

        <?php echo $add_rows ?>

      var options = {
        title: 'Amount of Time in the day',
        sliceVisibilityThreshold: 0
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);

      

    // Changing legend  
   

    };


	</script>

</head>
<body>

<div class="row-fluid" >
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
	<div class="span1"></div>
</div>


<div class="row-fluid" >
	<div class="span3"></div>
	<div class="span3"></div>
	<div class="span3"></div>
	<div class="span3"></div>

</div>



<div class="row-fluid" >
	<div class="span6"></div>
	<div class="span6"></div>
</div>


<div class="row-fluid" >
	<div class="span12" ></div>
</div>


<div id="chart_div" style="width: 900px; height: 500px;"></div>


</body>
</html>