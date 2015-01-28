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
  $clanUpdateQuery = "INSERT INTO `$dbname`.`clans` (`ClanID`, `Name`, `Emblem`) VALUES (NULL, ".$_POST['clanN'].", ".$_POST['emblem'].")";
  mysqli_query($conn, $clanUpdateQuery) or die(mysqli_error());
  $clanN = $clans[$iteration]['Name'];
}elseif(isset($_REQUEST['submit3'])){
  $clanUpdateQuery = "DELETE FROM `$dbname`.`clanmembers` WHERE `UserID` = $id";
  mysqli_query($conn, $clanUpdateQuery) or die(mysqli_error());
  unset($clanN);
}
mysqli_close($conn); // Close the connection 
?>
<?php require_once(INCLUDES_PATH . "/settingsNav.php") ?>
<h3>Clan<h3>
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

<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
