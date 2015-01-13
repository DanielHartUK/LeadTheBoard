<?php 
include_once(TEMPLATES_PATH . "/header.php"); 
?>
<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
	<h1> <?php echo $class ?> </h1>
	<div class="sectionNavigation <?php if($admin == 1): echo 'drawerO'; endif; ?>">
		<ul>
			<a href="leaderboard.php"><li <?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if (false !== strpos($url,'leaderboard')) { echo 'class="currentPage"'; } ?>> Leaderboard </li></a>
			<a href="activity.php"><li <?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if (false !== strpos($url,'activity')) { echo 'class="currentPage"'; } ?>> Activity </li></a>
			<a href="achievements.php"><li <?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if (false !== strpos($url,'achievements')) { echo 'class="currentPage"'; } ?>> Acheivements </li></a>
			<a href="quests"><li <?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if (false !== strpos($url,'quests')) { echo 'class="currentPage"'; } ?>> Quests </li></a>
		</ul>
	</div>
	<div class="mainBlock <?php if($admin == 1): echo 'drawerO'; endif; ?>">
