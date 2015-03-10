<?php 
$login = 1;
require_once("../config.php");

if(!isset($_GET['token'])) {
	$url = SITE_URL; 
	header( "Location: $url" );	
} else {

	include_once(INCLUDES_PATH . "/demoVariables.php"); 
	include_once(INCLUDES_PATH . "/userSQL.php");
	include_once(TEMPLATES_PATH . "/header.php"); 
	?>
	<div class="content loginBk">
			<div class="logo"> LeadTheBoard! </div>
			<div class="login">
				<div class="title"> Reset Password </div>
				<?php if(isset($_GET['error'])) { 
					if($_GET['error'] == 1) { $message = "Your password isn't secure enough." ; }
					echo '<div class="warningBanner red">' .  $message  . '</div>'; 
				} ?>
				<form method="post"  style="overflow: auto;" action="<?php echo SITE_URL;?>/includes/reset.php?token=<?php echo $_GET["token"];?>">
					<p class="detailLabel">Password must be 8+ characters long, with a lowercase and uppercase letter, and a number.</p>
					<input class="field loginPassword" type="password" name="password" placeholder="Password">
					<input class="field loginPassword" type="password" name="confirm" placeholder="Confirm password">
					<div class="formSubmit">
						<input type="submit" class="submit loginSubmit button" value="Change password">
					</div>
				</form>
				<div class="loginSwitch"><div class="lsm"> Know your password? </div><a href="<?php echo SITE_URL;?>" ><div class="button blue"> Login </div> </a> </div>
			</div>
	
	</div>
	
	<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>

<?php }; ?>