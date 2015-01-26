<?php 
require_once("../config.php");
$profileUID =  $_GET['user'];
include_once(INCLUDES_PATH . "/profile.php"); 
include_once(TEMPLATES_PATH . "/header.php"); 
?>
	<div class="content noPadding">
		<div class="profileTop" style="background-color: <?php echo $userColourPrimary[$ProfileUserColourScheme] ?>;">
			<img src="<?php echo $ProfileProfilePic ?>" class="profilePicRound" title="goat" alt="<?php echo $firstName. ' ' .$surname; ?> Avatar">  
			<h1><?php echo $ProfileFirstName . ' ' . $ProfileSurname; ?> <span class="clanTag">[<?php echo $ProfileClan; ?>]</span>
			<?php if ($id == $profileUID) { ?>
				<a href="../views/account.php"><div class="editProfile button"> Edit Profile </div></a>	
			<?php } ?>
			</h1>
		</div>
		<div class="profileStats" style="background-color: <?php echo $userColourSecondary[$ProfileUserColourScheme] ?>;">	
			<div class="proStat"><div class="proIcon"> # </div><?php echo $ProfileUserPosition ?></div>
			<div class="proStat"><div class="flaticon-trophy56 proIcon"></div> <?php echo $ProfileAchievementsUnlocked ?>/<?php echo $ProfileAchievementsUnlockable ?>
			</div><div class="proStat"><div class="flaticon-pencil43 proIcon"></div> <?php echo $ProfileQuestsComplete ?>/<?php echo $ProfileQuestsAvailableAccumulation ?>
			</div><div class="proStat"><div class="flaticon-medal61 proIcon"></div> <?php echo $ProfileXp ?></div>
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
		        	<a href="achievements.php#achievementID-<?php echo $achievementsFulla[$ai]['AchievementID']; ?>"><img class="unlockableIcon profileAchievement" alt="<?php echo $achievementsFulla[$ai]['Name']; ?>" title="<?php echo $achievementsFulla[$ai]['Name']; ?>" src="../assets/achievements/<?php echo $achievementsFulla[$ai]['Icon']; ?>">
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
		        	<a href="quests.php#questID-<?php echo $questsFulla[$ai]['QuestID']; ?>"><img class="unlockableIcon profileQuest" alt="<?php echo $questsFulla[$ai]['Name']; ?>"  title="<?php echo $questsFulla[$ai]['Name']; ?>" src="../assets/quests/<?php echo $questsFulla[$ai]['Icon']; ?>">
		    	<?php $ai++;
				} 
			?>
		</div>
	</div>

<?php 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


