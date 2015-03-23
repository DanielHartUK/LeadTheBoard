<?php session_start();
$isAbout = 0;
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
require_once(INCLUDES_PATH . "/browserInfo.php");
?>

	<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
		<h1> About </h1>
		<?php require_once(TEMPLATES_PATH . "/aboutNav.php"); ?>


		<a href="mailto:<?php echo $supportEmail; ?>?Subject=LeadTheBoard! Support. Browser: <?php echo $browser['Browser'] . ' ' . $browser['From'] . ' ' .  $browser['UA']; ?>"><div class="button blue">Email Us</div></a>
	</div>

<?php 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>