<?php 
require_once("../config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 
require_once(INCLUDES_PATH . "/quests.php");
?>
<div class="quests">
	<div class="questInfo">
        <div class="questIcon" style="background-image: url(../assets/quests/<?php echo $questsFullb[0]['Icon']; ?>);">
        </div><div class="questDetails">
            <h1 class="questTitle"><?php echo $questsFullb[0]['Name'];?> </h1>
            <p class="questDesc"><?php echo $questsFullb[0]['Description']; ?> </p>
        </div><div class="questXP"><div class="flaticon-medal61"></div> <span><?php echo $questsFullb[0]['XPValue']; ?></span> </div>
	</div>
    <h2 class="sectionTitle"> Available Quests </h2>
	<?php 
    	// Displaying the available quests
        if($questsFullbCount == 0) {
            echo "No quests available yet, check back later!";
        }
    		$ai = 0; 
    		while($ai < $questsFullbCount) { ?>
                <?php if ($ai == 0) { ?>
        		<div class="questCircleCont selected">
                <?php } else { ?>
                <div class="questCircleCont">
                <?php }; ?>
                    <div 
            		class="questCircle" 
            		data-id="<?php echo $questsFullb[$ai]['questID']; ?>"  
            		data-name="<?php echo $questsFullb[$ai]['Name'];?>"  
            		data-desc="<?php echo $questsFullb[$ai]['Description']; ?>"  
            		data-icon="<?php echo $questsFullb[$ai]['Icon']; ?>"
                    data-xp="<?php echo $questsFullb[$ai]['XPValue']; ?>" 
            		style="background-image: url(../assets/quests/<?php echo $questsFullb[$ai]['Icon']; ?>);">
            		</div>
                </div>  
        	<?php $ai++;
    		}
	?>
    <h2 class="sectionTitle"> Completed Quests </h2>
    <?php 
        // Displaying the completed quests
        if($questsFullaCount == 0) {
            echo "No quests completed yet. XP is awarded for completing quests and will boost your position on the leaderboard";
        }
            $ai = 0; 
            while($ai < $questsFullaCount) { ?>
                <div class="questCircleCont">
                    <div 
                    class="questCircle" 
                    data-id="<?php echo $questsFulla[$ai]['questID']; ?>"  
                    data-name="<?php echo $questsFulla[$ai]['Name'];?>"  
                    data-desc="<?php echo $questsFulla[$ai]['Description']; ?>"  
                    data-icon="<?php echo $questsFulla[$ai]['Icon']; ?>"
                    data-xp="<?php echo $questsFulla[$ai]['XPValue']; ?>" 
                    style="background-image: url(../assets/quests/<?php echo $questsFulla[$ai]['Icon']; ?>);">
                    </div>
                </div>  
            <?php $ai++;
            }
    ?>
    <?php if($questsFullcCount !== 0) { ?>
    <h2 class="sectionTitle"> Expired Quests </h2>
        <?php 
    // Displaying the expired quests
        $ai = 0; 
        while($ai < $questsFullcCount) { ?>
            <div class="questCircleCont">
                <div 
                class="questCircle" 
                data-id="<?php echo $questsFullc[$ai]['questID']; ?>"  
                data-name="<?php echo $questsFullc[$ai]['Name'];?>"  
                data-desc="<?php echo $questsFullc[$ai]['Description']; ?>"  
                data-icon="<?php echo $questsFullc[$ai]['Icon']; ?>"
                data-xp="<?php echo $questsFullc[$ai]['XPValue']; ?>" 
                style="background-image: url(../assets/quests/<?php echo $questsFullc[$ai]['Icon']; ?>);">
                </div>
            </div>  
        <?php $ai++;
        } 
    ?>
    <?php }; ?>
</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
