<?php session_start();
require_once("config.php");
require_once(INCLUDES_PATH . "/demoVariables.php");
if (empty($_GET['user'])) {
	$profileUID = $id; 
} else {
	$profileUID =  $_GET['user'];
}
include_once(INCLUDES_PATH . "/profile.php"); 
include_once(TEMPLATES_PATH . "/header.php"); 
?>
	<div class="content <?php if($admin == 1): echo 'admin'; endif; ?> noPadding <?php if($userColourDark[$ProfileUserColourScheme] == 1) { echo 'dark'; }; ?> ">
		<div class="profileTop">
			<div class="profileInfo">
				<img src="<?php echo $ProfileProfilePic ?>" class="profilePicRound" title="goat" alt="<?php echo $firstName. ' ' .$surname; ?> Avatar">  
				<h3> 
					<strong> <?php echo $ProfileFirstName ?> </strong><br>
					<span> <?php echo $ProfileSurname ?> </span>
				</h3>
				<p class="clanTag"><?php echo $ProfileClan; ?>CLAN</p>



			<?php if ($id == $profileUID) { ?>
				<!-- <a href="../account/"><div class="editProfile button"> Edit Profile </div></a>	-->
			<?php } ?>
			</div>
			<div class="profileStats">
				<div class="profileStatBox position">
					<div class="profileChart statChartHolder">
						<div class="position">
							#
						</div>
					</div>
					<div class="profileStat">
						<h5> Class Position </h5>
						<h3> <?php echo $ProfileUserPosition ?><sup class="superscript"><?php if ($ProfileUserPosition == 1) : echo 'st'; elseif ($ProfileUserPosition == 2) : echo 'nd'; elseif ($ProfileUserPosition == 3) : echo 'rd'; else : echo 'th'; endif;?> </sup> </h3>
					</div>
				</div>
				<div class="profileStatBox achievements">
					<div class="profileChart statChartHolder">
                        <div class="progress-pie-chart progress-pie-chart0" data-percent="<?php echo $ProfileAchievementsUnlocked / $ProfileAchievementsUnlockable * 100; ?>"><!--Pie Chart -->
                            <div class="ppc-progress ppc-progress0" >
                                <div class="ppc-progress-fill ppc-progress-fill0"></div>
                            </div>
                            <div class="ppc-percents ppc-percents0">
                                <div class="pcc-percents-wrapper pcc-percents-wrapper0">
                                    <span class="pie-info"><div class="flaticon-trophy56"></div></span>
                                </div>
                            </div>
                        </div><!--End Chart -->
					</div>
					<div class="profileStat">
						<h5> Achievements </h5>
						<h3> <?php echo $ProfileAchievementsUnlocked .' / '. $ProfileAchievementsUnlockable; ?> </h3>
					</div>
				</div>
				<div class="profileStatBox quests">
					<div class="profileChart statChartHolder">
                        <div class="progress-pie-chart progress-pie-chart1" data-percent="<?php echo $ProfileQuestsComplete / $ProfileQuestsAvailableAccumulation * 100; ?>"><!--Pie Chart -->
                            <div class="ppc-progress ppc-progress1">
                                <div class="ppc-progress-fill ppc-progress-fill1"></div>
                            </div>
                            <div class="ppc-percents ppc-percents1">
                                <div class="pcc-percents-wrapper pcc-percents-wrapper1">
                                    <span class="pie-info"><div class="flaticon-pencil43"></div></span>
                                </div>
                            </div>
                        </div><!--End Chart -->
					</div>
					<div class="profileStat">
						<h5> Quests </h5>
						<h3> <?php echo $ProfileQuestsComplete .' / '. $ProfileQuestsAvailableAccumulation; ?> </h3>
					</div>
				</div>
				<div class="profileStatBox xp">
					<div class="profileChart">
                        <div class="progress-pie-chart progress-pie-chart2" data-percent="<?php echo $possibleXP / $totalXP * 100; ?>"><!--Pie Chart -->
                            <div class="ppc-progress ppc-progress2">
                                <div class="ppc-progress-fill ppc-progress-fill2"></div>
                            </div>
                            <div class="ppc-percents ppc-percents2">
                                <div class="pcc-percents-wrapper pcc-percents-wrapper2">
                                    <span class="pie-info"><div class="flaticon-medal61"></div></span>
                                </div>
                            </div>
                        </div><!--End Chart -->
					</div>
					<div class="profileStat">
						<h5> XP </h5>
						<h3> <?php echo $possibleXP .' / '. $totalXP; ?> </h3>
					</div>
				</div>				
			</div>
		</div>

		<div class="profileAchievements profileBox">
			<h2 class="sectionTitle"> Unlocked Achievements </h2>
			<?php 
			// Displaying the achievements list
				if ($achievementsFullaCount == 0) {
		            echo "<p class='unlockableMessage'>" . $ProfileFirstName . ' ' . $ProfileSurname . " hasn't unlocked any achievements yet. </p>";
		        }
		        $ai = 0; 
				while($ai < $achievementsFullaCount) { ?>
		        	<a href="../hub/achievements.php#achievementID-<?php echo $achievementsFulla[$ai]['AchievementID']; ?>"><img class="unlockableIcon profileAchievement" alt="<?php echo $achievementsFulla[$ai]['Name']; ?>" title="<?php echo $achievementsFulla[$ai]['Name']; ?>" src="../assets/achievements/<?php echo $achievementsFulla[$ai]['Icon']; ?>"></a>
		    	<?php $ai++;
				} 
			?>
		</div><div class="profileQuests profileBox">
			<h2 class="sectionTitle"> Completed Quests </h2>
			<?php 
			// Displaying the achievements list
				if ($questsFullaCount == 0) {
		            echo "<p class='unlockableMessage'>" . $ProfileFirstName . ' ' . $ProfileSurname . " hasn't completed any quests yet. </p>";
		        }
		        $ai = 0; 
				while($ai < $questsFullaCount) { ?>
		        	<a href="../hub/quests.php#questID-<?php echo $questsFulla[$ai]['QuestID']; ?>"><img class="unlockableIcon profileQuest" alt="<?php echo $questsFulla[$ai]['Name']; ?>"  title="<?php echo $questsFulla[$ai]['Name']; ?>" src="../assets/quests/<?php echo $questsFulla[$ai]['Icon']; ?>"></a>
		    	<?php $ai++;
				} 
			?>
		</div>
	</div>

<?php 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


