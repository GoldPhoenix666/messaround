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

$dataid = mysqli_real_escape_string($conn, $_POST['dataid']);
$datagrab = mysqli_query($conn, "SELECT * FROM `personactivities` WHERE `dataid` = '$dataid'");
$activityinfo = mysqli_fetch_assoc($datagrab);
?>

<!DOCTYPE html >
<html>
<head>	

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

<table class='table-hover span6'>
	<tr>
		<th>ID</th>
		<th>Activity</th>
		<th>Hours</th>
		<th>Minutes</th>
		<th>Person ID</th>
		<th>Name</th>
	</tr>
	<tr>
<?php 
	echo "<td>" . $dataid . "</td>" ;
	echo "<td>" . $activityinfo['activity'] . "</td>";
	echo "<td>" . $activityinfo['hours'] . "</td>";
	echo "<td>" . $activityinfo['minutes'] . "</td>";
	echo "<td>" . $activityinfo['personid'] . "</td>";

	$sql = mysqli_query($conn, "SELECT * FROM `personname` WHERE `personid` = ' " . $activityinfo['personid'] . " '");
	$row2 = mysqli_num_rows($sql);
	while ($row2 = mysqli_fetch_array($sql)){
	echo "<td>" . $row2['personname'] . "</td>";
	};
?>
	</tr>
</table>
<br />
<br />
<br />
<br />
<br />

	<form class='span6' method="post" action="sqledit.php">
			<input type="hidden" name="dataid" value="<?php echo $dataid ?>">
				<label for="activity">Enter your activity:</label>
			<input type="text"  name="activity" value="<?php echo $activityinfo['activity']; ?>"><br />
				<label for="hours">Hours of said activity:</label>
			<input type="number"  name="hours" value="<?php echo $activityinfo['hours']; ?>"><br />
				<label for="Minutes">Minutes of said activity:</label>
			<input type="number"  name="minutes" min="0" max="59" value="<?php echo $activityinfo['minutes']; ?>">
			<br />
				<label for="personname">Pick your name:</label>
			<select name="personid">
<?php
	$sql = mysqli_query($conn, "SELECT * FROM `personname`");
	$row = mysqli_num_rows($sql);
	while ($row = mysqli_fetch_array($sql)){

	if ($row['personid'] == $activityinfo['personid']) {
	echo "<option selected=\"selected\" value='" . $row['personid'] . "'>". $row['personname'] . " - " . $row['personid']  . "</option>";
	} else {
	echo "<option value='" . $row['personid'] . "'>". $row['personname'] . " - " . $row['personid']  . "</option>";					
	}}
?>
			</select>	
			<input type="submit" style="margin-top:-10px;" class="btn btn-success btn-small" value="Update" name="update" />
	</form>
</body>
</html>