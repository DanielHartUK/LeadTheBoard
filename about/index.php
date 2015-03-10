<?php session_start();
$isAbout = 1;
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>

	<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
		<h1> About </h1>
		<?php require_once(TEMPLATES_PATH . "/aboutNav.php"); ?>
	</div>

<?php 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


