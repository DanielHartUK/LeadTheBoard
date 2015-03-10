<?php
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create a connection to the database
$joinClan = $conn->prepare("INSERT INTO `clanmembers`(`ClanID`, `UserID`, `clanAdmin`) VALUES (?, ?, ?)");
$joinClan->bind_param('iii', $clanID, $id, $clanAdmin);

$newClan = $conn->prepare("INSERT INTO `clans` (`ClanID`, `Name`, `Emblem`) VALUES (NULL, ?, ?)");
$newClan->bind_param('ss', $clanN, $file_name);

$leaveClan = $conn->prepare("DELETE FROM `$dbname`.`clanmembers` WHERE `UserID` = $id");

if(isset($_REQUEST['submit1'])){
  foreach($clans as $value){
    if($_POST["clanChoice"] == $value['ClanID']){
      $clanID = $value['ClanID'];
      $clanAdmin = 0;
      $clanN = $value['Name'];
      $joinClan->execute();
    }
  }
}elseif(isset($_REQUEST['submit2'])){
  $file_upload = true;
  $msg = "";

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
      $dosubmit = true;
      $emblem = $file_path;
      $clanN = $_POST['clanN'];
      foreach($clans as $value){
        if($clanN == $value['Name']){
          $dosubmit = false;
        }
      }
      if($dosubmit){
        $newClan->execute();

        unset($clans);
        $clans = array();

        while($row = mysqli_fetch_assoc($cla)) {
          $clans[] = $row;
        } 
        echo end($clans)['clanID'];
        $clanID = 0;
        $clanAdmin = 1;
        $joinClan->execute();
        //$clanID = $clans[]['ClanID'];
      }
    }
  } else {
    echo $msg;
  }
}elseif(isset($_REQUEST['submit3'])){
  $leaveClan->execute();
  unset($clanN);
}
mysqli_close($conn); // Close the connection 
