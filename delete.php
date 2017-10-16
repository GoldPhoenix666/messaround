<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piechart";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$dataid = mysqli_real_escape_string($conn, $_POST['dataid']);
$datainsert = mysqli_query($conn, "DELETE FROM `personactivities` WHERE `personactivities`.`dataid` = '$dataid' ");

if ($datainsert) {
    //echo "New record created successfully";
    header('location: correct.php?status=3');
} else {
   // echo "Error: " . $datainsert . "<br>" . mysqli_error($conn);
    header('location: correct.php?status=6');
}
?>