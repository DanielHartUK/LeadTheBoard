<?php 
$isOverview = 0;
require_once("../../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 

if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} else {
?>

	<div class="content">
		<h1> Dashboard </h1>
		<?php require_once(TEMPLATES_PATH . "/dashboardNav.php"); ?>
	</div>

<?php 
}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


