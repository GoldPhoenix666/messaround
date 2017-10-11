
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

$conn->close();
?>	



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


$sqlquery2 = mysqli_query($conn, "SELECT * FROM `chartinfo`");



$add_rows2 = '';
while ($row = mysqli_fetch_assoc($sqlquery2)) {


    $add_rows2 .= 'data.addRow(["' . 
    $row['name'] . "  " . 
    '", ' . $row['quantity'] . 
    ']);';


  };



 ?>


<html>
  <head>
  	<link rel="stylesheet" type="text/css" href="index.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

      





















                                                            <!--PIECHART-->

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
                                                            <!--PIECHART-->
























                                                            <!--BARCHART-->

<script type="text/javascript">
  
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawVisualization);

function drawVisualization() {

      var data = new google.visualization.DataTable();
        data.addColumn('string', 'name');
        data.addColumn('number', 'Quantity');
      data.addColumn({type: 'string', role: 'annotation'});
    
       var info = [
      {
        name: "Test 1",
        qn: 1
      }
    ];


    var data = new google.visualization.arrayToDataTable([
      ['', 'Total: '],
      // add each element manually
      [info[0]["name"] , info[0]["qn"]],  //first element
    ]);

    // add each element via forEach loop
    info.forEach(function(value, index, array){
      data.addRow([
        value.name,
        value.qn
      ]);
    })

       <?php echo $add_rows2 ?>


  

      var options = {
                    vAxis:{direction: -1},
          title: 'Amount of money I spend',
          chartArea: {width: '30%'},
        hAxis: {
          title: 'Pounds spent £',
          minValue: 0
        },

        vAxis: {
          title: 'Barchart',
          direction:'-1'
        },



        annotation:{
        1:{

        style:'line'

          }         
        }


      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));

      chart.draw(data, options);
    };



</script>
                                                            <!--BARCHART-->
























                                                            <!--MIDDLE LINE-->

<script type="text/javascript">
function drawChartSecond(resp) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Activity');
    data.addColumn('number', 'Hours');
    data.addRows([
        ['Work', 1],
    ]);
    
    var view = new google.visualization.DataView(data);
    view.setColumns([{
        type: 'number',
        label: data.getColumnLabel(0),
        calc: function (dt, row) {
            return {v: row + 1, f: dt.getValue(row, 0)};
        }
    }, 1]);
    
    var ticks = [];
    for (var i = 1; i < data.getNumberOfRows(); i++) {
        ticks.push({v: i + 0, f: data.getValue(i, 0)});
    }
    
    var options = {
        title : '',
        legend: {
            position: 'right',
            alignment: 'top'
        },
        tooltip: {
            isHtml: true
        },
        hAxis: {
            title: 'Activity',
            titleTextStyle: {
                color: 'Black',
                fontSize : '12',
                fontName : 'Arial'
            },
            baselineColor: '#CCCCCC',
            ticks: ticks
        },
        chartArea : {
            left: '8%',
            top: '8%',
            height:'70%',
            width:'10%'
        }
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('chartdivsecond'));
    chart.draw(view, options);
}
google.load('visualization', '1', {packages:['corechart'], callback: drawChartSecond});

</script>
                                                            <!--MIDDLE LINE-->


</head>
<body>


<div id="chart_div" style="width: 900px; height: 500px;"></div>

<div style="float:left;" id="chart_div2"></div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div id="chartdivsecond"></div>


<br />
<br />


<div id="infobox">



</div>

</body>

</html>
