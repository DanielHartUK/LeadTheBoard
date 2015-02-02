<?php 
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 

if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/snippets/wrongPermissions.php"); 
} else {
?>

	<div class="content">
		
	</div>

<?php 
}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


