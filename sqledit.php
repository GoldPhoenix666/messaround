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
$dataid = mysqli_real_escape_string($conn, $_POST['dataid']);
$hours = mysqli_real_escape_string($conn, $_POST['hours']);
$minutes = mysqli_real_escape_string($conn, $_POST['minutes']);
$personid = mysqli_real_escape_string($conn, $_POST['personid']);

$datainsert = mysqli_query($conn, "
UPDATE `personactivities` SET `activity` = '$activity', `hours` = '$hours', `minutes` = '$minutes', `dataid` = '$dataid', `personid` = '$personid' WHERE `personactivities`.`dataid` ='$dataid'");

if ($datainsert) {
	header('location: correct.php?status=1');
} else {
	header('location: correct.php?status=4');
}
?>
