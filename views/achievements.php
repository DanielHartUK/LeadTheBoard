<?php 
require_once("../config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 
require_once(INCLUDES_PATH . "/achievements.php");
?>
<div class="achievements">
	<div class="achievementInfo">
        <div class="achievementIcon" style="background-image: url(../assets/achievements/<?php echo $achievements[0]['Icon']; ?>);"></div>
		<div class="achievementDetails">
            <h1 class="achievementTitle"><?php echo $achievements[0]['Name'];?> </h1>
            <p class="achievementDesc"><?php echo $achievements[0]['Description']; ?> </p>
            <p class="achievementXP">XP: <?php echo $achievements[0]['XPValue']; ?> </p>
            <?php echo $xpScore; ?>
        </div>
	</div>
    <h2 class="sectionTitle"> Unlocked Achievements </h2>
	<?php 
	// Displaying the achievements list
		$ai = 0; 
		while($ai < $row_cnt) { ?>
            <?php if ($ai == 0) { ?>
    		<div class="achievementCircleCont selected">
            <?php } else { ?>
            <div class="achievementCircleCont">
            <?php }; ?>
            <div 
    		class="achievementCircle" 
    		data-id="<?php echo $achievements[$ai]['AchievementID']; ?>"  
    		data-name="<?php echo $achievements[$ai]['Name'];?>"  
    		data-desc="<?php echo $achievements[$ai]['Description']; ?>"  
    		data-icon="<?php echo $achievements[$ai]['Icon']; ?>"
            data-xp="<?php echo $achievements[$ai]['XPValue']; ?>" 
    		onmouseover=" 
            $('.achievementCircleCont').removeClass('selected')
            $(this).parent().addClass('selected')
    		x = $(this).data('icon');
    		icon = 'url(../assets/achievements/' + x + ')';
    		$('.achievementTitle').text($(this).data('name')); 
    		$('.achievementDesc').text($(this).data('desc')); 
            $('.achievementXP').text('XP: ' + $(this).data('xp'));
    		$('.achievementIcon').css('background-image', icon); 
    		" 
    		style="background-image: url(../assets/achievements/<?php echo $achievements[$ai]['Icon']; ?>);">
    		</div>
            </div>  
    	<?php $ai++;
		} 
	?>
    <h2 class="sectionTitle"> Locked Achievements </h2>
</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
