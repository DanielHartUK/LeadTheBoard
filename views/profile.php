<?php 
include_once(TEMPLATES_PATH . "/header.php"); 
$profileUID =  $_GET['user'];
?>
	<div class="content">
hello  <?php echo $profileUID; ?>


	</div>

<?php 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>