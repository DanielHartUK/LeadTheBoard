<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Array Usage
// $array[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

// Get the logs
$sql = "SELECT * FROM LoginAttempts";
$query = mysqli_query($conn, $sql) or die(mysqli_error());
$logsCount = $query->num_rows;
$logs = array();

while($row = mysqli_fetch_assoc($query)) {
   $logs[] = $row;
}


mysqli_close($conn); // Close the connection 




