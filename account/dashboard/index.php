<?php 
require_once("../../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 

if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} else {
?>

	<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
		<h1> Dashboard </h1>
		
	</div>

<?php 
}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


