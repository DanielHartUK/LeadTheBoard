<?php 
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
$isAccountIndex = 1;
require_once(INCLUDES_PATH . "/accountDetails.php"); 

?>
<div class="content">
  <h1> Account </h1>
  <?php include_once(TEMPLATES_PATH . "/settingsNav.php"); ?>
  <form name='personalDetails' action='' method=post> 
    <div class="formContainer">
      <p class="detailLabel">First Name</p>
      <div class="inputField disabled"><?php echo($firstName); ?></div>
      <p class="detailLabel">Surname</p>
      <div class="inputField disabled"><?php echo($surname); ?></div>
      <p class="detailLabel">Email address</p>
      <input type="email" name="email" value="<?php echo($email); ?>" class="inputField">
      <p class="detailLabel">Time zone</p>    
      <select name="timeZone" class="inputField">
        <?php include_once(TEMPLATES_PATH . "/timezone.php"); ?>
      </select>
      <p class="detailLabel"> Colour scheme: </p> 
      <div class="colourOptions">
        <div class="colourOption a <?php if($userColourScheme == 0) { echo 'selected'; } ?>">
        </div><div class="colourOption b <?php if($userColourScheme == 1) { echo 'selected'; } ?>">
        </div><div class="colourOption c <?php if($userColourScheme == 2) { echo 'selected'; } ?>">
        </div>
      </div>
      <input name='submit' class="button blue"  type="submit" value="Submit">  
    </div>
    <div class="picContainer">
      <img class="accountPic" src="<?php echo $profilePic ?>">
      <div type="file" class="changePic" onchange="readPicture(this)"> Change Avatar </div>
    </div>
  </form>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
