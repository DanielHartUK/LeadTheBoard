<?php session_start();
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
$isAccountIndex = 0;
require_once(INCLUDES_PATH . "/accountDetails.php"); 

?>







<div class="content">
  <h1> Account </h1>
  <?php include_once(TEMPLATES_PATH . "/accountNav.php"); ?>
  <form name='personalDetails' action='' method=post> 
    <div class="formContainer">
      <p class="detailLabel">Current password</p>
      <input type="password" name="currentpassword" class="inputField">
      <p class="detailLabel">New password</p>
      <input type="password" name="newpassword" class="inputField">
      <p class="detailLabel">Confirm new password</p>
      <input type="password" name="confirmpassword" class="inputField">
      <input name='submit' class="button blue"  type="submit" value="Change Password">  
    </div>
  </form>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
