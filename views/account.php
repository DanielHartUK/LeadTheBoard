<?php 
require_once("../config.php");

require_once(TEMPLATES_PATH . "/mainTop.php"); 
?>
<script language="javascript">
function readPicture(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_picture_preview')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create a connection to the database
if(isset($_POST["submit1"])){
  
  $file_upload = true;

  if($_FILES[profile_picture_upload][size]>1000000){
    $msg=$msg."Your uploaded file size is more than 1MB
so please reduce the file size and then upload.<BR>";
    $file_upload=false;
  }
  if (!($_FILES[profile_picture_upload][type] =="image/jpeg" OR $_FILES[profile_picture_upload][type] =="image/gif" OR $_FILES[profile_picture_upload][type] =="image/png" OR $_FILES[profile_picture_upload][type] =="image/bmp")) {
    $msg=$msg."Your uploaded file must be a JPEG, BMP, PNG or GIF. Other file types are not allowed<BR>";
    $file_upload=false;
  }

  if($file_upload){
    $file_name=$_FILES[profile_picture_upload][name];
    $file_path="../assets/uploads/$file_name"; // the path with the file name where the file will be stored
    if(!move_uploaded_file($_FILES[profile_picture_upload][tmp_name], $file_path)){
    echo "Failed to upload file. Contact Site admin to fix the problem";
    } else {
      $avatarUpdateQuery = "UPDATE `$dbname`.`users` SET `Avatar` = '$file_name' WHERE `users`.`UserID` = '$id'";
      mysqli_query($conn, $avatarUpdateQuery) or die(mysqli_error());
      $profilePic = '/assets/uploads/' . $file_name;
    }
  } else {
    echo $msg;
  }
}
mysqli_close($conn); // Close the connection 
?>
<div class="sectionNavigation">
  <ul>
    <a href="http://localhost/views/personalDetails.php"><li>Edit Personal Details</li></a>
    <a href="http://localhost/views/account.php"><li>Edit Avatar</li></a>
    <a href="http://localhost/views/clan.php"><li>Clan</li></a>
  </ul>
</div>
<div class="accountSettings">
  <h3>Profile Picture</h3>
  <form name="profile_picture_form" ENCTYPE="multipart/form-data" method=post action="">
  <img style="display:block; max-width:40%; max-height:40%" id="profile_picture_preview" src="<?php echo $profilePic ?>">
  <input type="file" name="profile_picture_upload" onchange="readPicture(this)">
  <input name="submit1" id="submit1" type="submit" value="Upload Image">
  </form>
  <h3>Colour Scheme</h3>
  
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
