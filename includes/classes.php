<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Array Usage
// $array[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

// Get the classes
$selClasses = "SELECT * FROM Classes WHERE AdminID='$id'";
$clq = mysqli_query($conn, $selClasses) or die(mysqli_error());
$classCount = $clq->num_rows;
$classes = array();

while($row = mysqli_fetch_assoc($clq)) {
   $classes[] = $row;
}
foreach($classes as $value){
   $classID = $value['ClassID'];

   // Get the class members
   $selClassesM = "SELECT * FROM ClassMembers WHERE ClassID='$classID'";
   $cmq = mysqli_query($conn, $selClassesM) or die(mysqli_error());
   $classMCount = $cmq->num_rows;
   

   while($row = mysqli_fetch_assoc($cmq)) {
      $classMembers[$classID][] = $row;
      echo $classMembers[$classID]['UserID'];
   }




}

mysqli_close($conn); // Close the connection 




