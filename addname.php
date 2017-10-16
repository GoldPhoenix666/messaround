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

$personname = mysqli_real_escape_string($conn, $_POST['personname']);
$datainsert = mysqli_query($conn, "INSERT INTO `personname` (`personname`) VALUES ('$personname') ");

if ($datainsert) {
  //  echo "New record created successfully" . mysqli_error($conn);
	header('location: correct.php?status=2');
} else {
   // echo "<br /> Error: " . $datainsert . "<br>" . mysqli_error($conn);
   	header('location: correct.php?status=5');
}
?>