<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Array Usage
// $array[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

// Get the logs
$sql = "SELECT * FROM Analytics";
$query = mysqli_query($conn, $sql) or die(mysqli_error());
$analyticsCount = $query->num_rows;
$analytics = array();

while($row = mysqli_fetch_assoc($query)) {
   $analytics[] = $row;
}


mysqli_close($conn); // Close the connection 




