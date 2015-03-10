<?php session_start();
$login = 1;
require_once("../config.php");
include_once(INCLUDES_PATH . "/demoVariables.php"); 
include_once(INCLUDES_PATH . "/userSQL.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>
<div class="content loginBk">
	<div class="logo"> LeadTheBoard! </div>

		<div class="login register">
			<div class="title"> Register </div>
			<?php if(isset($_GET['error'])) { 
				if($_GET['error'] == 1) { $message = "Your emails don't match."; }
				if($_GET['error'] == 2) { $message = "Your password isn't secure enough." ; }
				if($_GET['error'] == 3) { $message = 'Email is already registered.'; }
				echo '<div class="warningBanner red">' .  $message  . '</div>'; 
			} ?>
			<form style="overflow: auto;" id="register" method="post" action="<?php echo SITE_URL;?>/includes/register.php">
				<input class="field loginName" id="focus" type="text" name="firstname" placeholder="First Name">
				<input class="field loginName surname" type="text" name="surname" placeholder="Surname">
				<p class="detailLabel" style="display:none; color: red;"></p>
				<input class="field loginEmail" type="email" name="email" placeholder="Email Address">
				<input class="field loginConfirm" type="email" name="confirm" placeholder="Confirm Email Address">
				<p class="detailLabel">Password must be 8+ characters long, with a lowercase and uppercase letter, and a number.</p>
				<input class="field loginPassword" type="password" name="password" placeholder="Password">
				<div class="formSubmit">
					<input type="submit" class="submit loginSubmit button red" disabled="disabled" value="Register">
				</div>
			</form>

			<div class="loginSwitch"><div class="lsm"> Already registered? </div><a href="<?php echo SITE_URL;?>"><div class="button blue"> Login </div></a>  </div>
		</div>
</div>
<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>



		