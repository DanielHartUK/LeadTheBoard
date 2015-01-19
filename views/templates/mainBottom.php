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
					<?php 
						$ai = 0;
						if($questsFulldCount > 4) { $expiringCount = 4; } else { $expiringCount = $questsFulldCount; };
						while($ai < $expiringCount) { ?>
							<li>
								<img src="/assets/quests/<?php echo $questsFulld[$ai]['Icon']; ?>" class="questThumb">
								<?php echo $questsFulld[$ai]['Name']; ?> <br /> 
								<span>
								<?php $timeExpire = strtotime($questsFulld[$ai]['Expire']);
								if($timeExpire - time() < 60) {
									echo "Less than a minute remaining"; 
								} elseif($timeExpire - time() < 3600) {
									$remaining = floor(($timeExpire - time()) / 60);
									echo  $remaining . " minute";
									if($remaining >= 2){ echo "s";}; 
									echo " remaining"; 
								} elseif($timeExpire - time() < 86400) {
									$remaining = floor(($timeExpire - time()) / 3600);
									echo  $remaining . " hour";
									if($remaining >= 2){ echo "s";}; 
									echo " remaining"; 
								} else {
									$remaining = floor(($timeExpire - time()) / 86400);
									echo  $remaining . " day";
									if($remaining >= 2){ echo "s";}; 
									echo " remaining"; 
								}; ?>
								</span>
							</li>
						<?php $ai++;
						} 
					?>
				</ul>
			</div>
		</div>
	</div><?php endif; ?>
</div>
<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>







