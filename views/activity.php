<?php 
require_once("../config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 
require_once(INCLUDES_PATH . "/activity.php");
$itemsLimit = 10;
?>
<div class="activity">
	<div class="activityColumn achievementsActivity">
	    <h2 class="sectionTitle"> Achievements </h2>

		<?php 
		// Displaying the recent achievements activity
			if ($achievementsFullaCount == 0) {
	            echo "<p class='unlockableMessage'> No one has unlocked any achievements recently.</p>";
	        }
	        $ai = 0; 
	        if ($achievementsFullaCount < $itemsLimit) {
	        	$aLimit = $achievementsFullaCount;
	        } else {
	        	$aLimit = $itemsLimit;
	        }
			while($ai < $aLimit) { ?>
	        	<div class="activityEntry">
	        		<div class="userInfo" style="background-color: <?php echo $userColourPrimary[$achievementsFulla[$ai]['ColourScheme']] ?>;">
	        			<img class="userAvatar" alt="<?php echo $achievementsFulla[$ai]['Name'] . ' ' . $achievementsFulla[$ai]['Surname'] . ' avatar' ;?>" src="../assets/uploads/<?php echo $achievementsFulla[$ai]['Avatar']?>">
	        			<h3> <?php echo $achievementsFulla[$ai]['Name'] . ' ' . $achievementsFulla[$ai]['Surname']; ?> </h3>
	        			<p> unlocked an achievement </p>
	        		</div>
	        		<div class="unlockDetail">
	        			<img class="icon" alt="<?php echo $achievementsFulla[$ai]['aName'] . ' icon' ;?>" src="../assets/achievements/<?php echo $achievementsFulla[$ai]['Icon']?>">
	        			<h3> <?php echo $achievementsFulla[$ai]['aName']; ?> </h3>
	        			<p> <span class="flaticon-medal61 activityXP"></span>  <?php echo $achievementsFulla[$ai]['XPValue']; ?> </p>	        		
	        		</div>
	        	</div>
	    	<?php $ai++;
			} 
		?>
	</div><div class="activityColumn questsActivity">
	    <h2 class="sectionTitle"> Quests </h2>

		<?php 
		// Displaying the recent achievements activity
			if ($questsFullaCount == 0) {
	            echo "<p class='unlockableMessage'> No one has completed any quests recently.</p>";
	        }
	        $ai = 0; 
	        if ($questsFullaCount < $itemsLimit) {
	        	$qLimit = $questsFullaCount;
	        } else {
	        	$qLimit = $itemsLimit;
	        }
			while($ai < $qLimit) { ?>
	        	<div class="activityEntry">
	        		<div class="userInfo" style="background-color: <?php echo $userColourPrimary[$questsFulla[$ai]['ColourScheme']] ?>;">
	        			<img class="userAvatar" alt="<?php echo $questsFulla[$ai]['Name'] . ' ' . $questsFulla[$ai]['Surname'] . ' avatar' ;?>" src="../assets/uploads/<?php echo $questsFulla[$ai]['Avatar']?>">
	        			<h3> <?php echo $questsFulla[$ai]['Name'] . ' ' . $questsFulla[$ai]['Surname']; ?> </h3>
	        			<p> completed a quest </p>
	        		</div>
	        		<div class="unlockDetail">
	        			<img class="icon" alt="<?php echo $questsFulla[$ai]['qName'] . ' icon' ;?>" src="../assets/quests/<?php echo $questsFulla[$ai]['Icon']?>">
	        			<h3> <?php echo $questsFulla[$ai]['qName']; ?> </h3>
	        			<p> <span class="flaticon-medal61 activityXP"></span>  <?php echo $questsFulla[$ai]['XPValue']; ?> </p>	        		
	        		</div>
	        	</div>
	    	<?php $ai++;
			} 
		?>
	</div><div class="activityColumn xpActivity">
	    <h2 class="sectionTitle"> XP Awards </h2>
		<?php 
		// Displaying the recent achievements activity
			if ($xpAFullaCount == 0) {
	            echo "<p class='unlockableMessage'> No one has completed any quests recently.</p>";
	        }
	        $ai = 0; 
	        if ($xpAFullaCount < $itemsLimit) {
	        	$xLimit = $xpAFullaCount;
	        } else {
	        	$xLimit = $itemsLimit;
	        }
			while($ai < $xLimit) { ?>
	        	<div class="activityEntry">
	        		<div class="userInfo" style="background-color: <?php echo $userColourPrimary[$xpAFulla[$ai]['ColourScheme']] ?>;">
	        			<img class="userAvatar" alt="<?php echo $xpAFulla[$ai]['Name'] . ' ' . $xpAFulla[$ai]['Surname'] . ' avatar' ;?>" src="../assets/uploads/<?php echo $xpAFulla[$ai]['Avatar']?>">
	        			<h3> <?php echo $xpAFulla[$ai]['Name'] . ' ' . $xpAFulla[$ai]['Surname']; ?> </h3>
	        			<p> was awarded XP </p>
	        		</div>
	        		<div class="unlockDetail">
	        			<h3> <?php echo $xpAFulla[$ai]['Description']; ?> </h3>
	        			<p> <span class="flaticon-medal61 activityXP"></span>  <?php echo $xpAFulla[$ai]['XP']; ?> </p>	        		
	        		</div>
	        	</div>
	    	<?php $ai++;
			} 
		?>

	</div>
</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
