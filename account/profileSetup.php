<?php session_start();
$login = 1;
$profileSetup = 1;

// If profile is set up, redirect to index, else 

require_once("../config.php");
include_once(INCLUDES_PATH . "/demoVariables.php"); 
include_once(INCLUDES_PATH . "/userSQL.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>

<div class="content loginBk">
	<div class="logo"> LeadTheBoard! </div>

		<div class="login profile" style="text-align: center;">
			<div class="title"> Profile </div>

			<form style="overflow: auto;" enctype="multipart/form-data" method="post" action="<?php echo SITE_URL;?>/includes/profileSetup.php">
				<h4> Profile Picture </h4>
				<div class="picContainer">
      				<!-- TO DO
              <img class="accountPic" src="<?php echo SITE_URL;?>/assets/profileEmpty.png">
      				<div type="file" class="changePic" onchange="readPicture(this)"> Change Avatar </div>
                <input style="display:none" type='file' accept='image/jpeg, image/bmp, image/png, image/gif' id='imageUpload' name='emblem' onchange="$('#emblemUploadBox').html('<img id=\'emblemPreview\'>'), readPicture(this)"/>
              	<div onclick="$('#imageUpload').click()" id="emblemUploadBox" class="imageNew">Upload <br /> Emblem </div>  -->
              <input type="file" name="file" id="fileUpload">
   				</div>
      			<h4> Colour Scheme </h4>
      			<div class="colourOptions">
      			  	<input class="colourRadio" type="radio" name="colourOption" value="0" id="coloura">
      			  	<input class="colourRadio" type="radio" name="colourOption" value="1" id="colourb">
      			  	<input class="colourRadio" type="radio" name="colourOption" value="2" id="colourc">
       				<div class="colourOption a">
       				</div><div class="colourOption b">
       				</div><div class="colourOption c">
      			 	</div>
      			</div>
				<div class="formSubmit">
					<input type="submit" class="submit loginSubmit button"  value="Complete">
				</div>
			</form>
		</div>
</div>
<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>



		