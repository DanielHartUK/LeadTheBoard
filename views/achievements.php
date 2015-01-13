<?php 
require_once("../config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 
require_once(INCLUDES_PATH . "/achievements.php");

?>
<div class="achievements">
	<div class="achievementInfo">
			<?php echo $aTitle[$value]; ?> 
			<?php echo $aTitle[$value]; ?> 
			<?php echo $aDesc[$value]; ?>
			<?php echo $aValue[$value]; ?> 
	</div>
	<?php foreach ($aID as $value) { ?>
		<div class="achievementCircle" style="background-image: url(../assets/achievements/<?php echo $aPic[$value]; ?>);"></div>
	<?php } ?>
</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
