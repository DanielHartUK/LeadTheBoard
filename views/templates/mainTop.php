<?php 
include_once(TEMPLATES_PATH . "/header.php"); 

function pageURLContains($x) {
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if (false !== strpos($url, $x)) { echo 'class="currentPage"'; };
}
?>
<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
	<h1> <?php echo $class ?> </h1>
	<div class="sectionNavigation <?php if($admin == 1): echo 'drawerO'; endif; ?>">
		<ul>
			<a href="/"><li <?php pageURLContains($x = leaderboard) ?>> Leaderboard </li></a>
			<a href="/views/activity.php"><li <?php pageURLContains($x = activity) ?>> Activity </li></a>
			<a href="/views/achievements.php"><li <?php pageURLContains($x = achievements) ?>> Acheivements </li></a>
			<a href="/views/quests.php"><li <?php pageURLContains($x = quests) ?>> Quests </li></a>
		</ul>
	</div>
	<div class="mainBlock <?php if($admin == 1): echo 'drawerO'; endif; ?>">