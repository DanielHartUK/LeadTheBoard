<?php 
require_once("../config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 
require_once(INCLUDES_PATH . "/quests.php");
?>
<div class="quests">
    <h2 class="sectionTitle"> Available Quests </h2>
	<?php 
    // Displaying the available quests B
        if($questsFullbCount == 0) {
            echo "<p class='unlockableMessage'> No quests available yet, check back later!  </p>";
        }
    	$ai = 0; 
    	while($ai < $questsFullbCount) { ?>
            <div class="unlockableListCont" id="questID-<?php echo $questsFullb[$ai]['QuestID']; ?>">
                <div class="unlockableIcon quest" style="background-image: url(../assets/quests/<?php echo $questsFullb[$ai]['Icon']; ?>);">
                </div><div class="unlockableDetails">
                    <h2 class="unlockableTitle"> <?php echo $questsFullb[$ai]['Name'];?> </h2>
                    <p class="unlockableDesc"> <?php echo $questsFullb[$ai]['Description']; ?> </p>
                    <p class="unlockableExpire"> <?php echo 'Expires: '. date('H:i | l, j/m/y',strtotime($questsFullb[$ai]['Expire'])); ?> </p>
                </div><div class="unlockableXP"><div class="flaticon-medal61"></div> <span><?php echo $questsFullb[$ai]['XPValue']; ?> </span></div>
            </div>
        <?php $ai++;
    	}
	?>
    <h2 class="sectionTitle"> Completed Quests </h2>
    <?php 
        // Displaying the completed quests A
        if($questsFullaCount == 0) {
            echo "<p class='unlockableMessage'> No quests completed yet. XP is awarded for completing quests and will boost your position on the leaderboard </p>";
        }
        $ai = 0; 
        while($ai < $questsFullaCount) { ?>
            <div class="unlockableListCont" id="questID-<?php echo $questsFulla[$ai]['QuestID']; ?>">
                <div class="unlockableIcon quest" style="background-image: url(../assets/quests/<?php echo $questsFulla[$ai]['Icon']; ?>);">
                </div><div class="unlockableDetails">
                    <h2 class="unlockableTitle"> <?php echo $questsFulla[$ai]['Name'];?> </h2>
                    <p class="unlockableDesc"> <?php echo $questsFulla[$ai]['Description']; ?> </p>
                </div><div class="unlockableXP"><div class="flaticon-medal61"></div> <span><?php echo $questsFulla[$ai]['XPValue']; ?> </span></div>
            </div>
        <?php $ai++;
        }
    ?>
    <?php if($questsFullcCount !== 0) { ?>
    <h2 class="sectionTitle"> Expired Quests </h2>
        <?php 
    // Displaying the expired quests C
        $ai = 0; 
        while($ai < $questsFullcCount) { ?>
            <div class="unlockableListCont" id="questID-<?php echo $questsFullc[$ai]['QuestID']; ?>">
                <div class="unlockableIcon quest" style="background-image: url(../assets/quests/<?php echo $questsFullc[$ai]['Icon']; ?>);">
                </div><div class="unlockableDetails">
                    <h2 class="unlockableTitle"> <?php echo $questsFullc[$ai]['Name'];?> </h2>
                    <p class="unlockableDesc"> <?php echo $questsFullc[$ai]['Description']; ?> </p>
                    <p class="unlockableExpire"> <?php echo 'Expired: '. date('H:i | l, j/m/y',strtotime($questsFullc[$ai]['Expire'])); ?> </p>
                </div><div class="unlockableXP"><div class="flaticon-medal61"></div> <span><?php echo $questsFullc[$ai]['XPValue']; ?> </span></div>
            </div>
        <?php $ai++;
        } 
    ?>
    <?php }; ?>
</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
