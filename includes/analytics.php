<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Get the logs
$sql = "SELECT * FROM Analytics ORDER BY Time Desc";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$analyticsCount = $query->num_rows;
$analytics = array();

while($row = mysqli_fetch_assoc($query)) {
   $analytics[] = $row;
}

mysqli_close($conn); // Close the connection 




