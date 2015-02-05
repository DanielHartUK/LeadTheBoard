<?php 
require_once("../config.php");

include_once(TEMPLATES_PATH . "/header.php"); 
?>
<script language="javascript">
function readPicture(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#emblemPreview')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create a connection to the database
if(isset($_REQUEST['submit1'])){
  foreach($clans as $iteration => $value){
    if($_POST["clanChoice"] == $clans[$iteration]['ClanID']){
      $clanUpdateQuery = "INSERT INTO `clanmembers`(`ClanID`, `UserID`, `clanAdmin`) VALUES (".$clans[$iteration]['ClanID'].",$id,0)";
      mysqli_query($conn, $clanUpdateQuery) or die(mysqli_error());
      $clanN = $clans[$iteration]['Name'];
    }
  }
}elseif(isset($_REQUEST['submit2'])){
  $file_upload = true;

  if($_FILES[emblem][size]>1000000){
    $msg=$msg."Your uploaded file size is more than 1MB
so please reduce the file size and then upload.<BR>";
    $file_upload=false;
  }
  if (!($_FILES[emblem][type] =="image/jpeg" OR $_FILES[emblem][type] =="image/gif" OR $_FILES[emblem][type] =="image/png" OR $_FILES[emblem][type] =="image/bmp")) {
    $msg=$msg."Your uploaded file must be a JPEG, BMP, PNG or GIF. Other file types are not allowed<BR>";
    $file_upload=false;
  }

  if($file_upload){
    $file_name=$_FILES[emblem][name];
    $file_path="../assets/uploads/$file_name"; // the path with the file name where the file will be stored
    if(!move_uploaded_file($_FILES[emblem][tmp_name], $file_path)){
    echo "Failed to upload file. Contact Site admin to fix the problem";
    } else {
      $emblem = $file_path;
      $clanUpdateQuery = "INSERT INTO `$dbname`.`clans` (`ClanID`, `Name`, `Emblem`) VALUES (NULL, ".$_POST['clanN'].", $file_name)";
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
?>
<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
  <h1> Account </h1>
  <?php include_once(INCLUDES_PATH . "/settingsNav.php"); ?>
  <h3>Clan</h3>
  <form name='clan' action='' method=post ENCTYPE="multipart/form-data">
    <?php
    if(!isset($clanN)){
      echo("<p>You aren't a member of any clan. Do you want to join one? Or make a new one?</p><select name='clanChoice'><option value=''>Pick an existing clan</option>");
      foreach($clans as $iteration => $value){
        echo("<option value='".$clans[$iteration]['ClanID']."'>".$clans[$iteration]['Name']."</option>");
      }
      echo("</select><input name='submit1' type='submit' value='Save Choice'>");
      echo("<p>New Clan</p><table border=2><tr><td>Clan Name</td><td><input type='text' name='clanN'</td></tr>");
      echo("<tr><td>Emblem</td><td><input type='file' accept='image' name='emblem' onchange='readPicture(this)'></td></tr>");
      echo("</table><img id='emblemPreview' src='' style='max-height=40%; max-width=40%'>");
      echo("<input name='submit2' type='submit' value='Save New Clan'>");
      
  }else{
    echo("<p>You are a member of the clan: $clanN </p>");
    echo("<img id='emblemPreview' src='/assets/uploads/$emblem' style='max-height=40%; max-width=40%'>");
    echo("<input name='submit3' type='submit' value='Leave Clan'>");
  }
  ?>
  </form>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
