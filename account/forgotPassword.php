<?php 
$login = 1;
require_once("../config.php");
include_once(INCLUDES_PATH . "/demoVariables.php"); 
include_once(INCLUDES_PATH . "/userSQL.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>
<div class="content loginBk">
		<div class="logo"> LeadTheBoard! </div>
		<div class="login">
			<div class="title"> Reset Password </div>
			<div class="warningBanner transparent"> We'll email you with a link to reset your password. Please enter the email address used to register with LeadTheBoard! and we’ll contact you shortly. </div>
			<form method="post"  style="overflow: auto;" action="<?php echo SITE_URL;?>/includes/forgot.php">
				<input class="field loginEmail" id="focus" name="email" type="email" placeholder="Email Address">
				<div class="formSubmit">
					<input type="submit" class="submit loginSubmit button " value="Send">
				</div>
			</form>
			<div class="loginSwitch"><div class="lsm"> Know your password? </div><a href="<?php echo SITE_URL;?>" ><div class="button blue"> Login </div> </a> </div>
		</div>

</div>

<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>



		