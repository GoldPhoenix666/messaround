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


<form action="update.php">
<table style="width:200px">
	<tr>

<td><?php	echo $row['activity']. " : Activity</style><br />"; ?></td>
<input type="text" name="" value=""><br />

	</tr>
	<tr>

<td><?php	echo $row['hours']. " : Hours<br />"; ?></td>
<input type="text" name="" value="<?php $hours ?>"><br />


	</tr>
	<br />
	<tr>

<td><?php	echo $row['dataid']. " : DataId<br /><br />"; ?></td>

	</tr>
	


</table>

<input style="top:-45px; left:210px;" type="submit" value="Submit">
</form>



<form action="delete.php">
	<input style="top:-62.5px;" type="submit" value="X">
</form>



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


	<form action="newentry.php">

			<input type="text" name="" value=""><br />

			<input type="text" name="" value=""><br />

			<input type="submit" value="submit">

	</form>


</body>

</html>
