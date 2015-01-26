<?php 
include_once(TEMPLATES_PATH . "/header.php"); 
require_once(INCLUDES_PATH . "/unlockablesSQL.php");

?>
<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>" style="white-space: nowrap;">
	<h1> <?php echo $class ?> </h1>
	<div class="sectionNavigation <?php if($admin == 1): echo 'drawerO'; endif; ?>">
		<ul>
			<a href="/"><li <?php if($isLeaderboard == 1 ) { echo 'class="currentPage"'; };?>> Leaderboard </li></a>
			<a href="/views/activity.php"><li <?php if(pageURLContains($x = 'activity')) { echo 'class="currentPage"'; } ?>> Activity </li></a>
			<a href="/views/achievements.php"><li <?php if(pageURLContains($x = 'achievements')) { echo 'class="currentPage"'; } ?>> Acheivements </li></a>
			<a href="/views/quests.php"><li <?php if(pageURLContains($x = 'quests')) { echo 'class="currentPage"'; } ?>> Quests </li></a>
		</ul>
	</div>
	<div class="mainBlock <?php if($admin == 1): echo 'drawerO'; endif; ?>">
