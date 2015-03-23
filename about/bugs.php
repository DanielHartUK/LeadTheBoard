<?php session_start();
$isAbout = 0;
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 

require_once(INCLUDES_PATH . "/browserInfo.php"); // Require the php file

?>

	<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
		<h1> About </h1>
		<?php require_once(TEMPLATES_PATH . "/aboutNav.php"); ?>
		<h2 style="margin: 0 0 1% 0;"> Found a bug? Report it and help us make LeadTheBoard! better. </h2>
		<div class="debugInfo code">
			Browser: <?php // Get data from the array from browserInfo.php
			echo $browser['From'] . ' ' . $browser['Browser'] . '<br>' .  $browser['UA']; ?>
			<p> <?php echo apache_get_version(); ?> </p>
			<p>
			<span id='res'>  </span><br />
			<span id='windowSize'>  </span>
			</p>
			<p>LTB Release:  <?php echo $releaseName . " | " . $version; ?> </p>
		</div>
		<script>
			// Get the screen resolution and put it into the #res span
			document.getElementById("res").innerHTML = "Screen resolution: " + screen.width + "*" + screen.height; 
			// Get the window size and put it into the #windowSize span
			$("#windowSize").text('Window size: ' + $(window).width() + '*' + $(window).height());
			// Listen for window resizes and change the window size info on resize
			$(window).resize(function() { $("#windowSize").text('Window size: ' + $(window).width() + '*' + $(window).height()) });
		</script>
		<p> Please include the information in the box above when submitting a bug report.</p>
		<a href="https://github.com/KingDingDan/LeadTheBoard/issues"><div class="button blue"> Submit issue on GitHub </div></a>
		<a href="mailto:<?php echo $supportEmail; ?>"><div class="button blue"> Email us </div></a>

	</div>


<?php 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


