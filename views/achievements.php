<?php 
require_once("../config.php");
$isLeaderboard = 0;
require_once(TEMPLATES_PATH . "/mainTop.php"); 
?>
<div class="achievements">
    <h2 class="sectionTitle"> Unlocked Achievements </h2>
	<?php 
	// Displaying the achievements list
		if ($achievementsFullaCount == 0) {
            echo "<p class='unlockableMessage'> You haven't unlocked any achievements yet. XP is awarded for unlocking achievements and will boost your position on the leaderboard </p>";
        }
        $ai = 0; 
		while($ai < $achievementsFullaCount) { ?>
            <a class="headAnchor" id="achievementID-<?php echo $achievementsFulla[$ai]['AchievementID']; ?>"></a>
            <div class="unlockableListCont" id="achievementID-C-<?php echo $achievementsFulla[$ai]['AchievementID']; ?>">
                <div class="unlockableIcon achievement" style="background-image: url(../assets/achievements/<?php echo $achievementsFulla[$ai]['Icon']; ?>);">
                </div><div class="unlockableDetails">
                    <h2 class="unlockableTitle"> <?php echo $achievementsFulla[$ai]['Name'];?> </h2>
                    <p class="unlockableDesc"> <?php echo $achievementsFulla[$ai]['Description']; ?> </p>
                </div><div class="unlockableXP"><div class="flaticon-medal61"></div> <span><?php echo $achievementsFulla[$ai]['XPValue']; ?> </span></div>
        	</div>
    	<?php $ai++;
		} 
	?>
    <h2 class="sectionTitle"> Locked Achievements </h2>
    <?php 
    // Displaying the achievements list
        if ($achievementsFullbCount == 0) {
            echo "<p class='unlockableMessage'> You've unlocked all achievements! Come back later for more </p>";
        }
        $ai = 0; 
        while($ai < $achievementsFullbCount) { ?>
            <a class="headAnchor" id="achievementID-<?php echo $achievementsFullb[$ai]['AchievementID']; ?>"></a>
            <div class="unlockableListCont" id="achievementID-C-<?php echo $achievementsFullb[$ai]['AchievementID']; ?>">
                <div class="unlockableIcon achievement" style="background-image: url(../assets/achievements/locked.png);">
                </div><div class="unlockableDetails">
                    <h2 class="unlockableTitle"> <?php echo $achievementsFullb[$ai]['Name'];?> </h2>
                    <p class="unlockableDesc"> <?php echo $achievementsFullb[$ai]['Description']; ?> </p>
                </div><div class="unlockableXP"><div class="flaticon-medal61"></div> <span><?php echo $achievementsFullb[$ai]['XPValue']; ?> </span></div>
            </div>
        <?php $ai++;
        } 
    ?>
</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
