<?php session_start();
require_once("../config.php");
include_once(INCLUDES_PATH . "/demoVariables.php"); 
include_once(TEMPLATES_PATH . "/header.php"); 
?>
<div class="loginBack"><a href="/"> &#8592; Back </a></div>
<div class="content loginBk">
	<div class="login">
		<div class="logo"> LeadTheBoard! </div>
		<form method="post"  style="overflow: auto;" action="<?php echo SITE_URL;?>/includes/login.php">
			<input class="field loginEmail" name="email" type="email" placeholder="Email Address">
			<input class="field loginPassword" name="password" type="password" placeholder="Password">
			<div class="formSubmit">
				<p class="clickable" onclick="forgotClick()"> Forgot password? </p>
				<input type="submit" class="submit loginSubmit button " value="Login">
			</div>
		</form>
	</div>
</div>

<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>



		