<?php 
$isLeaderboard = 1;
require_once("../config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 
require_once(INCLUDES_PATH . "/leaderboard.php"); 
?>
<div class="leaderboard">
<button onclick="sorttable.innerSortFunction.apply(document.getElementById('xpSort'), [])"></button>
	<table class="mainBoard sortable">
	<thead>
		<tr class="headerBoard">
			<th>#</th>
			<th><div class="personIcon boardIcon"></div></th>
			<th>Student Name</th>
			<th><div class="achievementsIcon boardIcon"></div>Achievements</th>
			<th><div class="questsIcon boardIcon"></div>Quests</th>
			<th id="xpSort"><div class="xpIcon boardIcon"></div>XP</th>
		</tr>
	</thead>
	<tbody>
		<?php include(TEMPLATES_PATH . "/tableitems.php"); ?>
	</tbody>
	</table>
</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
