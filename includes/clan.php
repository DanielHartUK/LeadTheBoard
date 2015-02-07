<?php
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create a connection to the database
if(isset($_REQUEST['submit1'])){
  foreach($clans as $value){
    if($_POST["clanChoice"] == $value['ClanID']){
      $clanUpdateQuery = "INSERT INTO `clanmembers`(`ClanID`, `UserID`, `clanAdmin`) VALUES (".$value['ClanID'].",$id,0)";
      mysqli_query($conn, $clanUpdateQuery) or die(mysqli_error());
      $clanN = $value['Name'];
      
    }
  }
}elseif(isset($_REQUEST['submit2'])){
  $file_upload = true;

  if($_FILES['emblem']['size']>1000000){
    $msg=$msg."Your uploaded file size is more than 1MB
so please reduce the file size and then upload.<BR>";
    $file_upload=false;
  }
  if (!($_FILES['emblem']['type'] =="image/jpeg" OR $_FILES['emblem']['type'] =="image/gif" OR $_FILES['emblem']['type'] =="image/png" OR $_FILES['emblem']['type'] =="image/bmp")) {
    $msg=$msg."Your uploaded file must be a JPEG, BMP, PNG or GIF. Other file types are not allowed<BR>";
    $file_upload=false;
  }

  if($file_upload){
    $file_name=$_FILES['emblem']['name'];
    $file_path="../assets/uploads/$file_name"; // the path with the file name where the file will be stored
    if(!move_uploaded_file($_FILES['emblem']['tmp_name'], $file_path)){
    echo "Failed to upload file. Contact Site admin to fix the problem";
    } else {
      $emblem = $file_path;
      $clanUpdateQuery = "INSERT INTO `clans` (`ClanID`, `Name`, `Emblem`) VALUES (NULL, ".$_POST['clanN'].", $file_name)";
      mysqli_query($conn, $clanUpdateQuery) or die(mysqli_error());
      $clanN = $_POST['clanN'];
    }
  } else {
    echo $msg;
  }
}elseif(isset($_REQUEST['submit3'])){
  $clanUpdateQuery = "DELETE FROM `$dbname`.`clanmembers` WHERE `UserID` = $id";
  mysqli_query($conn, $clanUpdateQuery) or die(mysqli_error());
  unset($clanN);
}
mysqli_close($conn); // Close the connection 
