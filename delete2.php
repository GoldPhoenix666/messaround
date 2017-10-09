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

$personid = mysqli_real_escape_string($conn, $_POST['personid']);


$datainsert = mysqli_query($conn, "DELETE FROM `person` WHERE `person`.`personid` = '$personid' ");

var_dump("DELETE FROM `person` WHERE `person`.`personid` = '$personid' ");

if ($datainsert) {
    echo "New record created successfully";
    header('location: correct.php?status3=3');
} else {
    echo "Error: " . $datainsert . "<br>" . mysqli_error($conn);
    header('location: correct.php?status6=6');

}





?>