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


//THIS IS CODE FOR THE PIECHART//START
$piechartquery = mysqli_query($conn, "SELECT *, (SUM(`hours`)* 100 / (SELECT SUM(hours) FROM `pieinfo`)) AS `percent` FROM `pieinfo` GROUP BY `dataid`");


$add_rows = '';
while ($pierow = mysqli_fetch_assoc($piechartquery)) {


    $add_rows .= 'data.addRow(["' . $pierow['activity'] . "  " . $pierow['hours'] . " hours " .
    number_format((float)$pierow['percent'], 2, '.', '')  . "%" . '", ' . $pierow['hours'] . ']);';
};
//THIS IS CODE FOR THE PIECHART//END


//break bweteen


//This is the code for the BARCHART//START
$barchartquery = mysqli_query($conn, "SELECT * FROM `pieinfo`");



$add_rows2 = '';
while ($barrow = mysqli_fetch_assoc($barchartquery)) {


    $add_rows2 .= '
    data.addRow(["' . $barrow['activity'] . "  " . '", ' . $barrow['hours'] . ']);';


};
//This is the code for the BARCHART//END


//break bweteen


//Query Status//START
//If the GET command 'status1' is in the URL display this message
if(!empty($_GET['status1'])) {
	    $message = mysqli_real_escape_string($conn, $_GET['status1']);
$statusmessage = "<h1 class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>Update Successful!<p style='text-decoration:underline; font-size:20px;'>Information has been updated</p></h1>";
}



//If the GET command 'status2' is in the URL display this message
if(!empty($_GET['status2'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status2']);
$statusmessage = "<h1 class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>New Activity Added!<p style='text-decoration:underline; font-size:20px;'>Information has been added</p></h1>";
}



//If the GET command 'status3' is in the URL display this message
if(!empty($_GET['status3'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status3']);
$statusmessage =  "<h1 class='alert alert-success alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>Record Deleted!<p style='text-decoration:underline; font-size:20px;'>Information has been deleted</p></h1>";
}



//If the GET command 'status4' is in the URL display this message
if(!empty($_GET['status4'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status4']);
$statusmessage =  "<h1 class='alert alert-danger alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>Update Unsuccessful!<p style='text-decoration:underline; font-size:20px;'>Information has not been updated</p></h1>";
}



//If the GET command 'status5' is in the URL display this message
if(!empty($_GET['status5'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status5']);
$statusmessage =  "<h1 class='alert alert-danger alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>Entry Not Added!<p style='text-decoration:underline; font-size:20px;'>Information has not been added</p></h1>";
}



//If the GET command 'status6' is in the URL display this message
if(!empty($_GET['status6'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status6']);
$statusmessage =  "<h1 class='alert alert-danger alert-dismissable fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>Infomation Unaltered!<p style='text-decoration:underline; font-size:20px;'>Information has not been altered</p></h1>";
}
//Query Status//END


//break bweteen


//Data Grab for the first table//START
$datagrab = mysqli_query($conn, "SELECT * FROM `pieinfo` LEFT JOIN `person` ON `pieinfo`.`personid` = `person`.`personid` ORDER BY `personname` ASC, `activity` ASC");


$table1 = "
<div class='row-fluid'>
	<div class='span4' style=\"border:0px blue solid;\" >
		<table class='table-hover align-self-start '>
			<tr>
				<th>Name</th>
				<th>Hours</th>
				<th>Minutes</th>
				<th>Activity</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
";

while ($row = mysqli_fetch_assoc($datagrab)) {
$table1 .=  "
<tr>
		<td>" .$row['personname']. "</td>
		<td>" .$row['hours']. "</td>
		<td>" .$row['minutes']. "</td>
		<td>" .$row['activity']. "</td>
		<td>
			<form action=\"delete.php\" method=\"post\">
				<input type=\"hidden\" name=\"dataid\" value=\"". $row['dataid'] ."\" />
				<input type=\"submit\" style=\"margin-top:20px;\" class=\"btn btn-default\" value=\"Delete\" name=\"delete\" />
			</form>
		</td>
		<td>
			<form action=\"update.php\" method=\"post\">
				<input type=\"hidden\" name=\"dataid\" value=\"". $row['dataid'] ."\" />
				<input type=\"submit\"  style=\"margin-top:20px;\" class=\"btn btn-default\" value=\"Update\" name=\"update\" />
			</form>
		</td>
</tr>";

}

$table1 .= "
</table>
</div>
";
//Data Grab for the first table//END


//break bweteen tables 


//Data Grab for the second table//START
$conclusion = mysqli_query($conn, "SELECT `person`.`personid`, `personname`, IFNULL(SUM(`hours`), 0) as 'hours', IFNULL(SUM(`minutes`), 0) as 'minutes', IFNULL(COUNT(`activity`), 0) as 'activity' FROM `person` LEFT JOIN `pieinfo` ON `person`.`personid` = `pieinfo`.`personid` GROUP BY `personname` ORDER BY `activity` DESC ");


$addsecbar = "";


$table2 = "
<div class='span4' style=\"border:0px orange solid;\" >
<table class='table-hover'>
<tr>
<th>Name</th>
<th>Total Hours</th>
<th>Total Minutes</th>
<th># of Activities</th>
<th>Delete</th>
</tr>
";


while ($row = mysqli_fetch_assoc($conclusion)) {

$table2 .=  "
<tr>
		<td>" .$row['personname']. "</td>
		<td>" .$row['hours']. "</td>
		<td>" .$row['minutes']. "</td>
		<td>" .$row['activity']. "</td>
		<td>
			<form action=\"delete2.php\" method=\"post\">
				<input type=\"hidden\" name=\"personid\" value=\"". $row['personid'] ."\" />
				<input type=\"submit\" style=\"margin-top:20px;\" class=\"btn btn-default\" value=\"Delete\" name=\"delete\" />
			</form>
		</td>
</tr>";


	$addsecbar .= '
	data.addRow(["' . $row['personname'] . "  " . '", ' . $row['activity'] . ']);
	';
	
}

$table2 .= "
</table>
</div>
";
//Data Grab for the second table//END


//break bweteen tables 


//Data Grab for the third table//START
$threecharm = mysqli_query($conn, "SELECT `activity`, COUNT(`activity`) AS MOST_FREQUENT FROM `pieinfo` GROUP BY `activity` ORDER BY COUNT(`activity`) DESC");

$table3 = "
<div class='span4' style=\"border:0px green solid;\" >
<table class='table-hover'>
<tr>
<th>Activity</th>
<th>Occurrence</th>
</tr>
";

while ($lowrow = mysqli_fetch_assoc($threecharm)) {
$table3 .= "
<tr>
		<td>" .$lowrow['activity']. "</td>
		<td>" .$lowrow['MOST_FREQUENT']. "</td>
</tr>
";}

$table3 .= "
</table>
</div>
</div>
";
//Data Grab for the third table//END
?>
<!DOCTYPE html>

<html>

<head>

  	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

	<style type="text/css">
	
		body{
		padding:5px;
		}

		table, th, td {
   		border: 1px solid black;
    		border-collapse: collapse;
    		text-align:center;
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
        title: 'List of all Infomation',
        sliceVisibilityThreshold: 0
     	 };

      	var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      	chart.draw(data, options);
      	// Changing legend  
	};
	</script>


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
        qn: 0
      		}
    	];

    	var data = new google.visualization.arrayToDataTable([
      	['', 'Total: '],
      	[info[0]["name"] , info[0]["qn"]],  
    		]);


<?php echo $add_rows2 ?>  

      	var options = {
        title: 'Activities in hours',
        chartArea: {width: '70%',},
        hAxis: {
        chartArea: {height: '70%',},
        title: 'Hours',
        minValue: 0
        },

        vAxis: {
        title: 'Activity',
        direction:'1'
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


	<script type="text/javascript">
  
	  	google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawVisualization);

		function drawVisualization() {

     	var data = new google.visualization.DataTable();
        data.addColumn('string', 'name');
        data.addColumn('number', 'Quantity');
      	data.addColumn({type: 'string', role: 'annotation'});
    
       	var info = [{qn:0}];

    	var data = new google.visualization.arrayToDataTable([
      	['', 'Total: '], [info[0]["name"], info[0]["qn"]], ]);


<?php echo $addsecbar ?>  

      	var options = {
        title: 'Peoples activities',
        chartArea: {width: '70%',},
        hAxis: {
        chartArea: {height: '70%',},
        title: '# of Activities',
        minValue: 0
        },

        vAxis: {
        title: 'Name',
        direction:'-1'
        },

        annotation:{
        1:{

        style:'line'

          }         
        }
      	};
      	var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
      	chart.draw(data, options);
    };
	</script>

</head>


<body>


<!--This is to display the message after a query has been processed, also it says that if the variable is empty do not echo. By merging all of the variables into one and echoing it, it only display which one has data and does not display error messages saying the variable is empty-->
<?php

if(!empty($statusmessage)) {

echo $statusmessage;

}
?>

<div class='row-fluid'>

	<div class='span4' style="border:0px purple solid;" >

		<div id="chart_div2" style="height:500px;"></div>

	</div>


	<div class='span4' style="border:0px black solid;" >

		<div id="chart_div3" style="height:500px;"></div>
		
	</div>


	<div class='span4' style="border:0px grey solid;" >
				
		<div id="chart_div" style="height:500px;"></div>

	</div>

</div>



	<h2>This is the information from the server</h2>

<?php echo $table1 ?>	

<?php echo $table2 ?>

<?php echo $table3 ?>

<br />

<div class='row-fluid'>
<div class="span6" style="border: 0px red solid;" >

	<h3>Enter Information here to add Information</h3>

	<form action="newentry.php" method="post" >

		<label for="Activity">Enter your activity:</label>

			<input type="text" name="activity" placeholder="Activities" value="<?php echo $row['activity']; ?>">

		<label for="Hours">Hours of said activity:</label>

			<input type="number" name="hours" placeholder="Hours" value="<?php echo $row['hours']; ?>">


		<label for="Minutes">Minutes of said activity:</label>

			<input type="number" name="minutes" min="0" max="59" placeholder="Minutes" value="<?php echo $row['minutes']; ?>">



		<label for="personname">Pick your name:</label>

			<select name="personid">

				<?php
				$sql = mysqli_query($conn, "SELECT * FROM `person`");
				$row = mysqli_num_rows($sql);
				while ($row = mysqli_fetch_array($sql)){
				echo "<option value='" . $row['personid'] . "'>". $row['personname']  . "</option>";
				};?>

 			</select>

		<button type="submit" style="margin-top:-10px;" class="btn btn-success btn-small">Add</button>

		<br />
		<br />
		<br />
		<br />
		<br /> 

	</form>

</div>

<div class="span6" style="border: 0px red solid; ">
	<h3>Use this form to add a new name</h3>

	<form action="addname.php" method="post">
		
		<label for="Newname" >Add a new user:</label>

			<input type="text" name="personname" placeholder="Name" value="<?php echo $row['personname'] ?>" />

 		<button type="submit" style="margin-top:-10px;" class="btn btn-success btn-small">Add</button>

		<br />

	</form>

</div>
</div>

</body>

</html>