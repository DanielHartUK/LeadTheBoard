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