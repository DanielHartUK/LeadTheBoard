<?php session_start();
require_once("../config.php");
include_once(INCLUDES_PATH . "/demoVariables.php"); 
include_once(INCLUDES_PATH . "/userSQL.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>
<div class="loginBack"><a href="/"> &#8592; Back </a></div>
<div class="content loginBk">
	<?php if(isset($_GET['error'])) { 
		if($_GET['error'] == 1) { $message = "Your email doesn't match the confirm email"; }
		if($_GET['error'] == 2) { $message = "Your password isn't secure enough. <br> It must contain an uppercase letter, lowercase letter and a number, and be at least 8 characters long." ; }
		if($_GET['error'] == 3) { $message = 'Email is already registered.'; }
		echo '<div class="warningBanner red">' .  $message  . '</div>'; 
	} ?>
	<div class="login register">
		<div class="logo"> LeadTheBoard! </div>
		<form style="overflow: auto;" id="register" method="post" action="<?php echo SITE_URL;?>/includes/register.php">
			<input class="field loginName" type="text" name="firstname" placeholder="First Name">
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
	</div>
</div>

<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>



		