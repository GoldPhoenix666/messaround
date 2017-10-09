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


$datagrab = mysqli_query($conn, "SELECT * FROM `pieinfo`");

$add_rows = '';
while ($row = mysqli_fetch_assoc($datagrab)) {

?>

<div class='container'>
	<?php
		echo $row['activity']. " : Activity</style><br />";

		echo $row['hours']. " : Hours<br />";

		echo $row['dataid']. " : DataId<br /><br /><br />";
	?>
</div><br /><br /><br /><br /><br /><br />

<?php
  
$activity = $row['activity'];
$hours = $row['hours'];
$dataid = $row['dataid'];
};



?>


<html>

<head>
<link rel="stylesheet" type="text/css" href="display.css">
</head>

<body>


<div id="datashow">
<?php





?>
</div>


<form action="form.php">




<input type="text" name="" value="<?php $activity ?>"><br />

<input type="text" name="" value="<?php $hours ?>"><br />


<input type="submit" value="Submit">
</form> 




</body>

</html>
