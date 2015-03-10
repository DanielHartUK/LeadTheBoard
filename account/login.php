<?php 
$login = 1;
include_once(INCLUDES_PATH . "/demoVariables.php"); 
include_once(TEMPLATES_PATH . "/header.php"); 
?>
<div class="content loginBk">
		<div class="logo"> LeadTheBoard! </div>
		<div class="login">
			<div class="title"> Login </div>
			<?php if(isset($_GET['passwordreset'])) { 
				if($_GET['passwordreset'] == 1) { $message = "Password reset sent."; }
				if($_GET['passwordreset'] == 2) { $message = "Password reset"; }
				echo '<div class="warningBanner blue">' .  $message  . '</div>'; 
			} ?>
			<form method="post"  style="overflow: auto;" action="<?php echo SITE_URL;?>/includes/login.php">
				<input class="field loginEmail" id="focus" name="email" type="email" placeholder="Email Address">
				<input class="field loginPassword" name="password" type="password" placeholder="Password">
				<div class="formSubmit">
					<a class="lsm" href="<?php echo SITE_URL; ?>/account/forgotpassword.php"> Forgot password? </a>
					<input type="submit" class="submit loginSubmit button " value="Login">
				</div>
			</form>
			<div class="loginSwitch"><div class="lsm"> Need an account? </div><a href="<?php echo SITE_URL;?>/account/register.php" ><div class="button blue"> Register </div> </a> </div>
		</div>
</div>

<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>



		