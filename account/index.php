<?php 
require_once("../config.php");
//The config file contains the login credentials for the database, and some variables pointing to commonly used paths.
include_once(TEMPLATES_PATH . "/header.php"); 
//The header was made by the lead designer for the project, Daniel Hart. I'm using it so that the page fits into the whole aesthetic of the website.

$conn = mysqli_connect($servername, $username, $password, $dbname); // Create a connection to the database, so that values in the database can be edited.
if(isset($_REQUEST["submit1"])){ // checks that the submit button has been clicked.
  
  $file_upload = true; // if this is true after all the checks then the file is uploaded.

  if($_FILES[profile_picture_upload][size]>1000000){ // if the picture is larger than 1MB, then it's rejected and not uploaded ($file_upload is set to false).
    $msg=$msg."Your uploaded file size is more than 1MB
so please reduce the file size and then upload.<BR>";
    $file_upload=false;
  }
  if (!($_FILES[profile_picture_upload][type] =="image/jpeg" OR $_FILES[profile_picture_upload][type] =="image/gif" OR $_FILES[profile_picture_upload][type] =="image/png" OR $_FILES[profile_picture_upload][type] =="image/bmp")) { 
// if the picture isn't one of the allowed file types then it's rejected and the file is not uploaded ($file_upload is set to false).
    $msg=$msg."Your uploaded file must be a JPEG, BMP, PNG or GIF. Other file types are not allowed<BR>";
    $file_upload=false;
  }

  if($file_upload){ // if $file_upload hasn't been set to false, the file is uploaded to the server and the user's data 
    $file_name=$_FILES[profile_picture_upload][name];
    $file_path="../assets/uploads/$file_name"; // the path with the file name where the file will be stored
    if(!move_uploaded_file($_FILES[profile_picture_upload][tmp_name], $file_path)){
    echo "Failed to upload file. Contact Site admin to fix the problem";
    } else {
      $avatarUpdateQuery = "UPDATE `$dbname`.`users` SET `Avatar` = '$file_name' WHERE `users`.`UserID` = '$id'";
      mysqli_query($conn, $avatarUpdateQuery) or die(mysqli_error());
      $profilePic = '/assets/uploads/' . $file_name;
      echo "<script> location.reload(); </script>";
    }
  } else {
    echo $msg;
  }
}elseif(isset($_REQUEST["submit2"])){
  if(isset($_REQUEST["colour_scheme"])){
    if($userColourScheme === 0){echo "true";};
    $userColourScheme = intval($_POST["colour_scheme"]);
    $colourSchemeUpdateQuery = /*"UPDATE `$dbname`.`useroptions` SET `ColourScheme` = $colour_scheme WHERE `useroptions`.`UserID` = $id;"*/ "UPDATE `$dbname`.`useroptions` SET `ColourScheme` = $userColourScheme WHERE `useroptions`.`UserID` = '$id'";
    mysqli_query($conn, $colourSchemeUpdateQuery) or die(mysqli_error());
    echo "<script> location.reload(); </script>";
  }
}
mysqli_close($conn); // Close the connection 


?>
<script language="javascript">
/* This function is used to preview the images on the webpage before submitting them to the server as your profile picture.
   The function changes the src attribute on the image to match the file you've selected to upload. */
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

primary = new Array();
secondary = new Array();
<?php foreach($userColourPrimary as $value){echo("primary[primary.length] = '$value';\n");}?>
<?php foreach($userColourSecondary as $value){echo("secondary[secondary.length] = '$value';\n");}?>

function colourSchemePreview(colourID){
$( ".drawer" ).css( "background-color", primary[colourID] );
$( ".drawer .user" ).css( "background-color", secondary[colourID] );
  //alert("Primary: "+primary[colourID]+"\nSecondary: "+secondary[colourID]);
}
</script>
<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
  <h1> Account </h1>
  <?php include_once(INCLUDES_PATH . "/settingsNav.php"); ?>
  <form name="picture_colour_form" ENCTYPE="multipart/form-data" method=post action="">
    <div style="display:inline-block; margin-right:2em">
      <h3>Profile Picture</h3>
      <img style="display:block;max-width:40%;max-height: 40%;" id="profile_picture_preview" src="<?php echo $profilePic ?>">
      <input type="file" name="profile_picture_upload" onchange="readPicture(this)">
      <input name="submit1" id="submit1" type="submit" value="Upload Image">
    </div>
    <div style="display:inline-block; min-width:7em; height:70%">
      <h3>Colour Scheme</h3>
      <label>Ocean </label><input type=radio name="colour_scheme" onclick="colourSchemePreview(0)" value=0><br>
      <label>Desert </label><input type=radio name="colour_scheme" onclick="colourSchemePreview(1)" value=1><br>
      <label>Shadow </label><input type=radio name="colour_scheme" onclick="colourSchemePreview(2)" value=2><br>
      <input name="submit2" id="submit2" type="submit" value="Save Colour Scheme">
    </div>
  </form>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
