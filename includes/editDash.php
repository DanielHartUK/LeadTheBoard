<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Array Usage
// $array[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

$urlID = $_GET['class'];
// Get the class
$selClass = "SELECT * FROM Classes where AdminID='$id' AND ClassID='$urlID'";
$classq = mysqli_query($conn, $selClass) or die(mysqli_error());
$classCount = $classq->num_rows;
$classes = array();
while($row = mysqli_fetch_assoc($classq)) {
   $classes[] = $row;
}


// Get the students in a class
$selStudents = "SELECT UserID, Name, Surname, Avatar FROM Users WHERE Admin='0'";
$studentsq = mysqli_query($conn, $selStudents) or die(mysqli_error());
$studentsCount = $studentsq->num_rows;
$students = array();
while($row = mysqli_fetch_assoc($studentsq)) {
   $students[] = $row;
}



// Get the students in a class
$selStudentsClass = "SELECT Users.UserID, Users.Name, Users.Surname, Users.Avatar
FROM Users
INNER JOIN ClassMembers on ClassMembers.UserID = Users.UserID WHERE ClassMembers.ClassID='$urlID' AND Users.Admin='0'";
$studentsClassq = mysqli_query($conn, $selStudentsClass) or die(mysqli_error());
$studentsClassCount = $studentsClassq->num_rows;
$studentsClass = array();
while($row = mysqli_fetch_assoc($studentsClassq)) {
   $studentsClass[] = $row;
}

$val = 0;
$studentsInClass = "";
while ($val < $studentsClassCount) {
$studentsInClass = $studentsInClass . " " . $studentsClass[$val]['UserID'];
$val++;
};

mysqli_close($conn); // Close the connection 




