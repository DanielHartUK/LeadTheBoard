<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Array Usage
// $array[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

// Get the classes
$sql = "SELECT * FROM Classes WHERE AdminID='$id'";
$query = mysqli_query($conn, $sql) or die(mysqli_error());
$classCount = $query->num_rows;
$classes = array();

while($row = mysqli_fetch_assoc($query)) {
   $classes[] = $row;
}



mysqli_close($conn); // Close the connection 




