<?php 

$conn = mysqli_connect($servername, $username, $password, $dbname); // 

$sql = "SELECT Users.UserID, Users.Name, Users.Surname, Users.Avatar, ClassMembers.ClassID, Users.Admin
FROM `Users`
INNER JOIN `ClassMembers` on ClassMembers.UserID = Users.UserID WHERE ClassMembers.ClassID='$classID' AND Users.Admin='0'";
$leaderboardq = mysqli_query($conn, $sql) or die(mysqli_error());
$leaderboardCount = $leaderboardq->num_rows;
$leaderboarda = array();

while($row = mysqli_fetch_assoc($leaderboardq)) {
   $leaderboarda[] = $row;
}

mysqli_close($conn); // Close the connection 

