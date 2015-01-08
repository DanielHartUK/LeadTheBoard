<?php 
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>

<div class="content">
	<h1> <?php echo $class ?> </h1>
	<div class="sectionNavigation">
		<ul>
			<li class="currentPage"> Leaderboard </li>
			<li> Activity </li>
			<li> Acheivements </li>
			<li> Quests </li>
		</ul>
	</div>
	<div class="mainBlock">
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
				<tr class="boardEntry">
					<td class="pos" data-th="Position">1</td>
					<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">2</td>
					<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">3</td>
					<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">4</td>
					<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">5</td>
					<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">6</td>
					<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">bob Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">7</td>
					<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>
				</tr>
				<tr class="boardEntry">
					<td class="pos" data-th="Position">8</td>
					<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src=""></td>
					<td data-th="Student Name">Lorem Ipsum JR.</td>
					<td data-th="Achievements">88/88 (100%)</td>
					<td data-th="Quests">88/88 (100%)</td>
					<td data-th="XP">888</td>
				</tr>


			</tbody>
			</table>
		</div>
	</div><div class="sideBlock">
		<div class="youBox box"> 
			<div class="boxTitle" style="background-color: <?php echo $userColour ?>;"> You </div>
			<div class="boxContent">
				<img src="<?php echo $profilePic ?>" class="profilePicRound">
				<div class="bannerSmall"> <?php echo $userPosition ?><sup class="superscript"><?php if ($userPosition == 1) : echo 'st'; elseif ($userPosition == 2) : echo 'nd'; elseif ($userPosition == 3) : echo 'rd'; else : echo 'th'; endif;?> </sup></div>
				<p> 
					Achievements: <?php echo $achievementsUnlocked ?>/<?php echo $achievementsUnlockable ?>
					<br />
					Quests: <?php echo $questsComplete ?>/<?php echo $questsAvailableAccumulation ?>
					<br />
					XP: <?php echo $xp ?>
				</p>
			</div>
		</div>

		<div class="questsBox box"> 
			<div class="boxTitle"> Expiring Quests </div>
			<div class="boxContent">
				<ul class="expiringQuests">
					<li><img src="/assets/placeholder/goat.jpg" class="questThumb"> Lorem Ipsum <br /> <span>8 hours left</span></li>
					<li><img src="/assets/placeholder/goat.jpg" class="questThumb"> Lorem Ipsum <br /> <span>8 hours left</span></li>
					<li><img src="/assets/placeholder/goat.jpg" class="questThumb"> Lorem Ipsum <br /> <span>8 hours left</span></li>
					<li><img src="/assets/placeholder/goat.jpg" class="questThumb"> Lorem Ipsum <br /> <span>8 hours left</span></li>
				</ul>
			</div>
		</div>

	</div>
</div>
<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>