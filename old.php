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

?>

<table>

<tr>
<h2>This is the information from the server</h2>

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
		Del	
	</th>

</tr>

<?php while ($row = mysqli_fetch_assoc($datagrab)) { ?>


<tr>

<td>
	<form action=""><?php echo $row['activity']; ?>
		<div id="inputact" ><input type="text" name="activity" value="<?php echo $row['activity']; ?>">
			<br />
		</div>
	</form>
</td>



<td>
	<form action=""><?php echo $row['hours']; ?>
		<div id="inputhour" ><input type="text" name="hours" value="<?php echo $row['hours']; ?>">
			<br />
		</div>
	</form>
</td>




<td>
	<form method="post" action="sqledit.php"><?php echo $row['dataid']; ?>
		<div id="submitboth" >
			<input type="submit" name="dataid" value="<?php echo $row['dataid']; ?>">
		</div>
	</form>
</td>



<td>
	<form action="delete.php" method="post">
		<input type="submit" name="dataid" value="<?php echo $row['dataid']; ?>" >
	</form>
</td>




	
</tr>










<?php

};



?>
</table>

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
<br />
<br />
<br />


<table>

<tr>

<h3>Enter Information here to add Information</h1>

	<th>
	Activity/Hours - (VarChar/Int)
	</th>

</tr>


		<tr>

			<td>

			<form action="newentry.php" method="post" >

			<input type="text" name="activity" value="<?php echo $row['activity']; ?>">

			<input type="text" name="hours" value="<?php echo $row['id']; ?>">

			<input type="submit" value="Update">

			</form>

			</td>


		</tr>


</table>



</body>

</html>
