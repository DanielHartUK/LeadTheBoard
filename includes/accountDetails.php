<?php
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create a connection to the database
if(isset($_POST["submit1"])) {
  $firstName = $_POST['firstName'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $timeZone = $_POST['timeZone'];

  $personalUpdateQuery = "UPDATE `$dbname`.`users` SET `Name`='$firstName',`Surname`='$surname',`Email`='$email' WHERE `users`.`UserID` = '$id'"; 
  mysqli_query($conn, $personalUpdateQuery) or die(mysqli_error($conn));
  mysqli_query($conn, "UPDATE `$dbname`.`useroptions` SET `TimeZone`='$timeZone' WHERE `UserOptions`.`UserID`='$id'") or die(mysqli_error($conn));
  date_default_timezone_set($timeZone);
}
mysqli_close($conn); // Close the connection 