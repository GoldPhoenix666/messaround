
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


$sqlquery = mysqli_query($conn, "SELECT * FROM `pieinfo`");

while  ($row = mysqli_fetch_array($sqlquery)) {


$dataac = $row['activity'];
echo  "<p class='hours'>". $row['hours']. " Hours </p>";
echo  "<p class='percent'>". $row['percent']. "% </p>";
$datatest =  $row['dataid'];



}

$conn->close();
?>	


<html>
  <head>
  	<link rel="stylesheet" type="text/css" href="index.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	


	<script type="text/javascript" >
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {



     	var data = new google.visualization.DataTable();

      	data.addColumn('string', 'time');
      	data.addColumn('number', 'hours');
      	data.addRows([
        ['<?php echo $datatest. $dataac ?>', 30],
        ['', 50],
        ['', 05],
        ['', 10], 
        ['<?php echo $datatest. $dataac ?>', 05] 
      ]);

      var options = {
        title: 'Amount of Time in the day',
        sliceVisibilityThreshold: 0
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);

      

    // Changing legend  
    for (var i = 0; i < dataTable.length; i++) {
      dataTable[i][0] = dataTable[i][0] + " " + 
              dataTable[i][1] + " requests, " + ((dataTable[i][1] / total) * 100).toFixed(1) + "%"; 
    }

    }

</script>	
</head>
<body>


<div id="chart_div" style="width: 900px; height: 500px;"></div>


<br />
<br />


<div id="infobox">



</div>

</body>

</html>
