<?php 
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>

<div class="content">
	<h1> Class Name </h1>
	<div class="mainBlock">
		<div class="sectionNavigation">
			<ul>
				<li> Leaderboard </li>
				<li> Activity </li>
				<li> Acheivements </li>
				<li> Quests </li>
				<li> Change Class </li>
			</ul>
		</div>
		<div class="leaderboard">
			<table class="mainBoard">
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
				<tr class="boardEntry">
					<td class="pos" data-th="Position">1</td>
					<td data-th="avatar" id="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">2</td>
					<td data-th="avatar" id="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">3</td>
					<td data-th="avatar" id="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">4</td>
					<td data-th="avatar" id="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">5</td>
					<td data-th="avatar" id="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">6</td>
					<td data-th="avatar" id="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">7</td>
					<td data-th="avatar" id="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">8</td>
					<td data-th="avatar" id="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div><div class="sideBlock">
		<div class="youBox"> 
		</div>
	</div>
</div>
<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>