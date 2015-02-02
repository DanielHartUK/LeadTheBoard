<?php 
$isLeaderboard = 1;
require_once("config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 
?>
	<div class="leaderboard">
	<table class="mainBoard ">
	  <col width="">
  <col width="">
		<thead>
			<tr class="headerBoard">
				<th>#</th>
				<th style="text-align: center;"><div class="flaticon-user182 boardIcon" style="width: 100%;"></div></th>
				<th>Student Name</th>
				<th><div class="flaticon-trophy56 boardIcon"></div>Achievements</th>
				<th><div class="flaticon-pencil43 boardIcon"></div>Quests</th>
				<th><div class="flaticon-medal61 boardIcon"></div>XP</th>
			</tr>
		</thead>
		<tbody>
			<?php include(TEMPLATES_PATH . "/tableitems.php"); ?>
		</tbody>
		<tfoot>
		</tfoot>		
	</table>


</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
