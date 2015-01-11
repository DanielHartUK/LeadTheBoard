<?php 
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>

<div class="content <?php if($admin == 1): echo 'admin'; endif; ?>">
	<h1> <?php echo $class ?> </h1>
	<div class="sectionNavigation <?php if($admin == 1): echo 'drawerO'; endif; ?>">
		<ul>
			<li class="currentPage"> Leaderboard </li>
			<li> Activity </li>
			<li> Acheivements </li>
			<li> Quests </li>
		</ul>
	</div>
	<div class="mainBlock <?php if($admin == 1): echo 'drawerO'; endif; ?>">
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
				<?php include(TEMPLATES_PATH . "/tableitems.php"); ?>
			</tbody>
			</table>
		</div>
	</div><?php if ($admin == 0): ?><div class="sideBlock">
		<div class="youBox box"> 
			<div class="boxTitle" style="background-color: <?php echo $userColourPrimary[$userColourScheme] ?>;"> You </div>
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
	</div><?php endif; ?>
</div>
<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>