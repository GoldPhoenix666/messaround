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


$datagrab = mysqli_query($conn, "SELECT * FROM `pieinfo` LEFT JOIN `person` ON `pieinfo`.`personid` = `person`.`personid` ORDER BY `personname` ASC, `activity` ASC");


$table1 = "
<div class='row-fluid'>
<div class='span4' style=\"border:1px blue solid;\" >
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



//break bweteen tables 



$conclusion = mysqli_query($conn, "SELECT `person`.`personid`, `personname`, IFNULL(SUM(`hours`), 0) as 'hours', IFNULL(SUM(`minutes`), 0) as 'minutes', IFNULL(COUNT(`activity`), 0) as 'activity' FROM `person` LEFT JOIN `pieinfo` ON `person`.`personid` = `pieinfo`.`personid` GROUP BY `personname` ORDER BY `activity` DESC ");



$table2 = "
<div class='span4' style=\"border:1px orange solid;\" >
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

}

$table2 .= "
</table>
</div>
";


$threecharm = mysqli_query($conn, "SELECT `activity`, COUNT(`activity`) AS MOST_FREQUENT FROM `pieinfo` GROUP BY `activity` ORDER BY COUNT(`activity`) DESC");

$table3 = "
<div class='span4' style=\"border:1px green solid;\" >
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
    	}

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

<?php echo $table3 ?>

<br />

<div class='row-fluid'>
<div class="span6" style="border: 1px red solid;" >

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

<div class="span6" style="border: 1px red solid; ">
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