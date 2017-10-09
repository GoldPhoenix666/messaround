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


$sqlquery = mysqli_query($conn, "SELECT * FROM `pieinfo`");

while  ($row = mysqli_fetch_array($sqlquery)) {


echo $row['activity']. "<br />";
echo $row['hours']. " Hours <br />";
echo $row['percent']. " Percent <br /><br />";

}

$conn->close();

 header('Location: index.php');




?>	