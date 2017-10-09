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


$datainsert = mysqli_query($conn, "DELETE FROM `pieinfo` WHERE `pieinfo`.`dataid` = '$dataid' ");



if ($datainsert) {
    echo "New record created successfully";
    header('location: correct.php?status3=3');
} else {
    echo "Error: " . $datainsert . "<br>" . mysqli_error($conn);
    header('location: correct.php?status6=6');

}





?>