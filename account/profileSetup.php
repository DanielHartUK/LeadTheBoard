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

			<form style="overflow: auto;" id="register" method="post" action="<?php echo SITE_URL;?>/includes/profileSetup.php">
				<h4> Profile Picture </h4>
				<div class="picContainer">
      				<img class="accountPic" src="<?php echo SITE_URL;?>/assets/profileEmpty.png">
      				<div type="file" class="changePic" onchange="readPicture(this)"> Change Avatar </div>
              	<input style="display:none" type='file' accept='image/jpeg, image/bmp, image/png, image/gif' id='imageUpload' name='emblem' onchange="$('#emblemUploadBox').html('<img id=\'emblemPreview\'>'), readPicture(this)"/>
              	<div onclick="$('#imageUpload').click()" id="emblemUploadBox" class="imageNew">Upload <br /> Emblem </div>  

   				</div>
      			<h4> Colour Scheme </h4>
      			<div class="colourOptions">
      			  	<input class="colourRadio" type="radio" name="colourOption" id="coloura">
      			  	<input class="colourRadio" type="radio" name="colourOption" id="colourb">
      			  	<input class="colourRadio" type="radio" name="colourOption" id="colourc">
       				<div class="colourOption a">
       				</div><div class="colourOption b">
       				</div><div class="colourOption c">
      			 	</div>
      			</div>
				<div class="formSubmit">
					<input type="submit" class="submit loginSubmit button" disabled="disabled" value="Complete">
				</div>
			</form>
		</div>
</div>
<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>



		