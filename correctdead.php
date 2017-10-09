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


$datagrab = mysqli_query($conn, "SELECT * FROM `pieinfo` LEFT JOIN `person` ON `pieinfo`.`personid` = `person`.`personid`");


$table1 = "
<div class='container-fluid'>
<div class='row'>
<table class='table-hover span6 align-self-start '>
<tr>
<th>Activity</th>
<th>Hours</th>
<th>Minutes</th>
<th>Name</th>
<th>Delete</th>
<th>Edit</th>
</tr>
";

while ($row = mysqli_fetch_assoc($datagrab)) {
$table1 .=  "
<tr>
		<td>" .$row['activity']. "</td>
		<td>" .$row['hours']. "</td>
		<td>" .$row['minutes']. "</td>
		<td>" .$row['personname']. "</td>
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
";



//break bweteen tables 

$personid = $row['personid'];


$datagrab = mysqli_query($conn, "SELECT * FROM `pieinfo` WHERE `personid` = '$personid'");


$activityinfo = mysqli_fetch_assoc($datagrab);


$conclusion = mysqli_query($conn, "SELECT *, SUM(`hours`) as 'hours', COUNT(`activity`) as 'activity' FROM `pieinfo` JOIN `person` ON `pieinfo`.`personid` = `person`.`personid` GROUP BY `personname` ORDER BY `personname` ASC");

$sql = mysqli_query($conn, "SELECT `personid` FROM `person` WHERE `personid` = '$personid'");
							$personrow = mysqli_num_rows($sql);
							while ($personrow = mysqli_fetch_array($sql)){

							if ($personrow['personid'] == $activityinfo['personid']) {
							echo $personrow['personname'] ;


							} else {

							echo $personrow['personname'] ;
							
							}

						}

var_dump($sql);

$table2 = "
<table class='table-hover span6 align-self-end'>
<tr>
<th>Name</th>
<th># of Activities</th>
<th>Total Hours</th>
<th>Delete</th>
</tr>
";

while ($row = mysqli_fetch_assoc($conclusion)) {
$table2 .=  "
<tr>
		<td>" .$row['personname']. "</td>
		<td>" .$row['activity']. "</td>
		<td>" .$row['hours']. "</td>
		<td>
			<form action=\"delete2.php\" method=\"post\">
				<input type=\"hidden\" name=\"personid\" value=\"". $row['personid'] ."\" />
				<input type=\"submit\" style=\"margin-top:20px;\" class=\"btn btn-default\" value=\"Delete\" name=\"delete\" />
			</form>


</tr>";

}

$table2 .= "
</table>
</div>
</div>
";
?>
<!DOCTYPE html>

<html>

<head>

	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
  	<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
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


	</style>

</head>

<body>


<!--This is to display the message after a query has been processed, also it says that if the variable is empty do not echo. By merging all of the variables into one and echoing it, it only display which one has data and does not display error messages saying the variable is empty-->
<?php

if(!empty($statusmessage)) {

echo $statusmessage;

}
?>

	<h2>This is the information from the server</h2>

<?php echo $table1 ?>	

<?php echo $table2 ?>

<br />
<br />
<br />
<br />
<br />
<br />

<div class='container-fluid'>
<div class='row'>
<div class="span6">

	<h3>Enter Information here to add Information</h3>

	<form action="newentry.php" method="post" >

		<label for="Activity">Enter your activity:</label>

			<input type="text" name="activity" placeholder="Activities" value="<?php echo $row['activity']; ?>">

		<label for="Hours">Hours of said activity:</label>

			<input type="text" name="hours" placeholder="Hours" value="<?php echo $row['hours']; ?>">


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

<div class="span6">
	<h3>Use this form to add a new name</h3>

	<form action="addname.php" method="post">
		
		<label for="Newname" >Add a new user:</label>

			<input type="text" name="personname" placeholder="Name" value="<?php echo $row['personname'] ?>" />

 				<button type="submit" style="margin-top:-10px;" class="btn btn-success btn-small">Add</button>

		<br />

	</form>

</div>
</div>
</div>

</body>

</html>