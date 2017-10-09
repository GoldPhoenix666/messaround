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

?>

 <!DOCTYPE html>

<html>

<head>

	<!--<link rel="stylesheet" type="text/css" href="display.css">-->
<style type="text/css">
	
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding:2px;
    line-height: 3;
    top:50px;
    text-align:center;


}

</style>


</head>

<body>

<?php


//If the GET command 'status1' is in the URL display this message
if(!empty($_GET['status1'])) {
	    $message = mysqli_real_escape_string($conn, $_GET['status1']);
echo "<h1 style='position:relative; background-color:lightgreen; width:14%; display:inline-block;' >Update Successful!</h1> <p style='display:inline-block; text-decoration:underline; font-size:20px;'>Information has been updated</p>";
}



//If the GET command 'status2' is in the URL display this message
if(!empty($_GET['status2'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status2']);
echo "<h1 style='position:relative; background-color:lightgreen; width:16%; display:inline-block;' >New Activity Added!</h1> <p style='display:inline-block; text-decoration:underline; font-size:20px;'>Information has been added</p>";
}



//If the GET command 'status3' is in the URL display this message
if(!empty($_GET['status3'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status3']);
echo "<h1 style='position:relative; background-color:lightgreen; width:12%; display:inline-block;' >Record Deleted!</h1> <p style='display:inline-block; text-decoration:underline; font-size:20px;'>Information has been deleted</p>";
}



//If the GET command 'status4' is in the URL display this message
if(!empty($_GET['status4'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status4']);
echo "<h1 style='position:relative; background-color:red; width:16%; display:inline-block;' >Update Unsuccessful!</h1> <p style='display:inline-block; text-decoration:underline; font-size:20px;'>Information has not been updated</p>";
}



//If the GET command 'status5' is in the URL display this message
if(!empty($_GET['status5'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status5']);
echo "<h1 style='position:relative; background-color:red; width:13%; display:inline-block;' >Entry Not Added!</h1> <p style='display:inline-block; text-decoration:underline; font-size:20px;'>Information has not been added</p>";
}


//If the GET command 'status6' is in the URL display this message
if(!empty($_GET['status6'])) {
    $message = mysqli_real_escape_string($conn, $_GET['status6']);
echo "<h1 style='position:relative; background-color:red; width:17%; display:inline-block;' >Infomation Unaltered!</h1> <p style='display:inline-block; text-decoration:underline; font-size:20px;'>Information has not been altered</p>";
}





$datagrab = mysqli_query($conn, "SELECT * FROM `pieinfo`");

$add_rows = '';

?>
<h2>This is the information from the server</h2>

<table>

<tr>

	<th>
		Activity
	</th>
	<th>
		Hours
	</th>
	<th>
		ID
	</th>
	<th>
		Delete
	</th>
	<th>
		Edit	
	</th>

</tr>

<?php while ($row = mysqli_fetch_assoc($datagrab)) { ?>


<tr>

<td>
<?php echo $row['activity'] ?>	
</td>



<td>
<?php echo $row['hours']; ?>
</td>




<td>
<?php echo $row['dataid'] ?>

</td>


<td>

	<form action="delete.php" method="post">
		<input type="hidden" name="dataid" value="<?php echo $row['dataid']; ?>" />
			<input type="submit" value="Delete" name="delete" />

	</form>

</td>


<td>
	<form action="update.php" method="post">
		<input type="hidden" name="dataid" value="<?php echo $row['dataid']; ?>" />
			<input type="submit" value="Update" name="update" />
	</form>
</td>



	
</tr>



<?php

};


?>


</table>


<br />
<br />
<br />


			<h3>Enter Information here to add Information</h3>







			<form action="newentry.php" method="post" >

				<label for="Activity">Activity:</label>

			<input type="text" name="activity" value="<?php echo $row['activity']; ?>">

				<label for="Hours">Hours:</label>

			<input type="text" name="hours" value="<?php echo $row['id']; ?>">

			<input type="submit" value="Update">

			</form>







</body>

</html>
