<?php
include('connect.php');

$userhourquery = mysqli_query($conn, "SELECT *, ROUND(SUM(`hours`)* 100 / (SELECT SUM(`hours`) FROM `personactivities`), 2)  AS `percent` FROM `personactivities` GROUP BY `dataid`");

$personactivitiesdata = '';
while ($row = mysqli_fetch_assoc($userhourquery)) {
    $personactivitiesdata .= 'piedata.addRow(["' . $row['activity'] . "  " . $row['hours'] . " hours " .
    $row['percent'] . "%" . '", ' . $row['hours'] . ']);';
}

$useractivityquery = mysqli_query($conn, "SELECT * FROM `personactivities`");

$activerows = '';
while ($row = mysqli_fetch_assoc($useractivityquery)) {
    $activerows .= 'activechartdata.addRow(["' . $row['activity'] . "  " . '", ' . $row['hours'] . ']);';
}

if (isset($_GET['status'])) {
$statuscode = mysqli_real_escape_string($conn, $_GET['status']);
} else {
$statuscode = 0;	
}

$message = false;
$error = false;

switch ($statuscode) {
	case 1:
	$message = 'Update Successful! Information has been updated';
		break;

	case 2:
	$message = 'New Activity Added! Information has been added';
		break;
	
	case 3:
	$message = 'Record Deleted! Information has been deleted';
		break;

	case 4:
	$error = 'Update Unsuccessful! Information has not been updated';
		break;	

	case 5:
	$error = 'Entry Not Added! Information has not been added';
		break;

	case 6:
	$error = 'Infomation Unaltered! Information has not been altered';
		break;

	default:
		break;
}

//Data Grab for the first table//START
$activitydata = mysqli_query($conn, "SELECT * FROM `personactivities` LEFT JOIN `personname` ON `personactivities`.`personid` = `personname`.`personid` ORDER BY `personname` ASC, `activity` ASC");

$activitytable = '<table class="table table-bordered table-hover" style="float: none; margin: 0 auto;">
			<tr>
				<th>Name</th><th>Hours</th><th>Minutes</th><th>Activity</th><th>Delete</th><th>Edit</th>
			</tr>';

while ($row = mysqli_fetch_assoc($activitydata)) {
$activitytable .=  '<tr>
	<td>' .$row['personname']. '</td>
	<td>' .$row['hours']. '</td>
	<td>' .$row['minutes']. '</td>
	<td>' .$row['activity']. '</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="'. $row['dataid'] .'" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="'. $row['dataid'] .'" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr>';
}

$activitytable .= '</table>';

//Data Grab for the second table//START
$peopledata = mysqli_query($conn, "SELECT `personname`.`personid`, `personname`, IFNULL(SUM(`hours`), 0) as 'hours', IFNULL(SUM(`minutes`), 0) as 'minutes', IFNULL(COUNT(`activity`), 0) as 'activity' FROM `personname` LEFT JOIN `personactivities` ON `personname`.`personid` = `personactivities`.`personid` GROUP BY `personname` ORDER BY `activity` DESC ");

$peoplechart = "";

$peopletable = '<table class="table table-bordered table-hover" style="float: none; margin: 0 auto;">
		<tr>
			<th>Name</th><th>Total Hours</th><th>Total Minutes</th><th># of Activities</th><th>Delete</th>
		</tr>';

while ($row = mysqli_fetch_assoc($peopledata)) {

$peopletable .=  '<tr>
	<td>' .$row['personname']. '</td>
	<td>' .$row['hours']. '</td>
	<td>' .$row['minutes']. '</td>
	<td>' .$row['activity']. '</td>
	<td>
		<form action="delete2.php" method="post">
			<input type="hidden" name="personid" value="'. $row['personid'] .'" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
</tr>';

$peoplechart .= '
namechartdata.addRow(["' . $row['personname'] . "  " . '", ' . $row['activity'] . ']);';
}

$peopletable .= '</table>';

//Data Grab for the third table//START
$occurrencedata = mysqli_query($conn, "SELECT `activity`, COUNT(`activity`) AS MOST_FREQUENT FROM `personactivities` GROUP BY `activity` ORDER BY COUNT(`activity`) DESC");

$occurrencetable = '<table class="table table-bordered table-hover" style="float: none; margin: 0 auto;" >
		<tr>
			<th>Activity</th>
			<th>Occurrence</th>
		</tr>';

while ($row = mysqli_fetch_assoc($occurrencedata)) {
$occurrencetable .= '
<tr>
	<td>' .$row['activity']. '</td>
	<td>' .$row['MOST_FREQUENT']. '</td>
</tr>';
}

$occurrencetable .= "</table>";
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
			padding: 5px;
		}


	</style>

	<script type="text/javascript" >
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {

		var piedata = new google.visualization.DataTable();

		piedata.addColumn('string', 'time');
		piedata.addColumn('number', 'hours');

<?php echo $personactivitiesdata ?>

		var options = {title: 'List of all Infomation', sliceVisibilityThreshold: 0};

		var chart = new google.visualization.PieChart(document.getElementById('piedatadiv'));
		chart.draw(piedata, options);};
	</script>

	<script type="text/javascript">
  
		google.charts.setOnLoadCallback(drawVisualization);

		function drawVisualization() {

     	var activechartdata = new google.visualization.DataTable();
        activechartdata.addColumn('string', 'name');
        activechartdata.addColumn('number', 'Quantity');

<?php echo $activerows ?>  

		activechartdata.sort({column: 1, desc: false});
		
      	var options = {title: 'Activities in hours', chartArea: {width: '60%'},
      	hAxis: {
      	title: 'Hours', minValue: 0},
        vAxis: {title: 'Activity', direction:'1'},
        annotation:{1:{style:'line'}}};
      	var chart = new google.visualization.BarChart(document.getElementById('activitydiv'));
      	chart.draw(activechartdata, options);
		};
	</script>

	<script type="text/javascript">
  
		google.charts.setOnLoadCallback(drawVisualization);

		function drawVisualization() {

     	var namechartdata = new google.visualization.DataTable();
        namechartdata.addColumn('string', 'name');
        namechartdata.addColumn('number', 'Quantity');
    
<?php echo $peoplechart ?>  

      	var options = {title: 'Peoples activities', chartArea: {width: '60%'},
      	hAxis: {
		title: '# of Activities', minValue: 0},
        vAxis: {title: 'Name', direction:'-1'},
        annotation:{1:{style:'line'}}};
      	var chart = new google.visualization.BarChart(document.getElementById('peoplediv'));
      	chart.draw(namechartdata, options);
		};
	</script>

</head>

<body>

<?php
if ($message) {
echo '<div class="alert alert-success"><p> ' . $message . '</p></div>';
} 

if ($error) {
echo '<div class="alert alert-danger"><p>' . $error . '</p></div>';
} 
?>

<h2 style="text-align:center; text-decoration:underline;" >User information from the server</h2>
<div class="row-fluid">
	<div class="span4" style="border:0px purple solid;" >
		<div id="activitydiv" style="min-height:500px;"></div>
	</div>
	<div class="span4" style="border:0px black solid;" >
		<div id="peoplediv" style="min-height:500px;"></div>		
	</div>
	<div class="span4" style="border:0px grey solid;" >				
		<div id="piedatadiv" style="min-height:500px;"></div>
	</div>
</div>

<div class="row-fluid">	
	<div class="span4">
		<?php echo $activitytable ?>	
	</div>
	<div class="span4">
		<?php echo $peopletable ?>
	</div>
	<div class="span4">
		<?php echo $occurrencetable ?>
	</div>
</div>

<br />

<div class="row-fluid">
<div class="span6" style="border: 0px red solid; text-align: center;">
	<h3>Add Information here</h3>
	<form action="newentry.php" method="post" style="float: none; margin: 0 auto;" >
		<label>Activity:</label>
			<input type="text" name="activity" required>
		<label>Hours:</label>
			<input type="number" name="hours" required>
		<label>Minutes:</label>
			<input type="number" name="minutes" min="0" max="59" required>
		<label>Name:</label>
			<select name="personid">

				<?php
				$newentry = mysqli_query($conn, "SELECT * FROM `personname`");
				$row = mysqli_num_rows($newentry);
				while ($row = mysqli_fetch_array($newentry)){
				echo "<option value='" . $row['personid'] . "'>". $row['personname']  . "</option>";
				};?>

 			</select>
			<br />
		<button type="submit" style="margin-top:-10px;" class="btn btn-success btn-small">Add</button>
	</form>
</div>

<div class="span6" style="border: 0px red solid;">
	<form action="addname.php" method="post" style="float: none; margin: 0 auto; text-align: center;">
		<h3>Add User</h3>		
		<label>Username:</label>
			<input type="text" name="personname" required />
			<br />
 		<button type="submit" style="margin-top:-10px;" class="btn btn-success btn-small">Add</button>
		<br />
	</form>
</div>
</div>
</body>

</html>