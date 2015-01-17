<?php 
require_once("../config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 
require_once(INCLUDES_PATH . "/leaderboard.php"); 
?>
<div class="leaderboard">
	<table class="mainBoard sortable">
	<thead>
		<tr class="headerBoard">
			<th>#</th>
			<th><div class="personIcon boardIcon"></div></th>
			<th>Student Name</th>
			<th><div class="achievementsIcon boardIcon"></div>Achievements</th>
			<th><div class="questsIcon boardIcon"></div>Quests</th>
			<th><div class="xpIcon boardIcon"></div>XP</th>
		</tr>
	</thead>
	<tbody>
		<?php include(TEMPLATES_PATH . "/tableitems.php"); ?>
	</tbody>
	</table>
</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
