<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piechart";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$personid = mysqli_real_escape_string($conn, $_POST['personid']);
$datainsert = mysqli_query($conn, "DELETE FROM `personname` WHERE `personname`.`personid` = '$personid' ");

var_dump("DELETE FROM `personname` WHERE `personname`.`personid` = '$personid' ");

if ($datainsert) {
//echo "New record created successfully";
    header('location: correct.php?status=3');
} else {
   // echo "Error: " . $datainsert . "<br>" . mysqli_error($conn);
    header('location: correct.php?status=6');
}
?>