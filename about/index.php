<?php session_start();
$isAbout = 1;
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>

	<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
		<h1> About </h1>
		<?php require_once(TEMPLATES_PATH . "/aboutNav.php"); ?>
		<div>Icons made by <a href="http://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a>, <a href="http://www.flaticon.com/authors/elegant-themes" title="Elegant Themes">Elegant Themes</a>, <a href="http://www.flaticon.com/authors/tutsplus" title="TutsPlus">TutsPlus</a>, <a href="http://www.flaticon.com/authors/icomoon" title="Icomoon">Icomoon</a>, <a href="http://www.flaticon.com/authors/simpleicon" title="SimpleIcon">SimpleIcon</a>, <a href="http://www.flaticon.com/authors/yannick" title="Yannick">Yannick</a>, <a href="http://www.flaticon.com/authors/google" title="Google">Google</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
	</div>

<?php 
include_once(TEMPLATES_PATH . "/notifications.php"); 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


