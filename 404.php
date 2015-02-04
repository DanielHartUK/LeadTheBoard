<?php 
require_once("config.php");
include_once(TEMPLATES_PATH . "/header.php"); 


?>

	<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
		<h1> 404 - Page not found :(</h1>
		<a href="/"> Go Home </a>
	</div>

<?php 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>