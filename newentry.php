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

$activity = mysqli_real_escape_string($conn, $_POST['activity']);
$hours = mysqli_real_escape_string($conn, $_POST['hours']);
$minutes = mysqli_real_escape_string($conn, $_POST['minutes']);
$personid = mysqli_real_escape_string($conn, $_POST['personid']);
$personname = mysqli_real_escape_string($conn, $_POST['personname']);





$datainsert = mysqli_query($conn, "INSERT INTO `pieinfo` (`activity`, `hours`, `minutes`, `personid`) VALUES ('$activity', '$hours', '$minutes', '$personid') ");

//var_dump("INSERT INTO `pieinfo` (`activity`, `hours`, `personid`) VALUES ('$activity', '$hours', '$personid') ");

if ($datainsert) {
    echo "New record created successfully" . mysqli_error($conn);
	header('location: correct.php?status2=2');

} else {
    echo "<br /> Error: " . $datainsert . "<br>" . mysqli_error($conn);
   	header('location: correct.php?status5=5');

}



?>