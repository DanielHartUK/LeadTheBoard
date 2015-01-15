<?php 
require_once("../config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 
require_once(INCLUDES_PATH . "/quests.php");
?>
<div class="quests">
	<div class="questInfo">
        <div class="questIcon" style="background-image: url(../assets/quests/<?php echo $quests[0]['Icon']; ?>);"></div>
		<div class="questDetails">
            <h1 class="questTitle"><?php echo $quests[0]['Name'];?> </h1>
            <p class="questDesc"><?php echo $quests[0]['Description']; ?> </p>
            <p class="questXP">XP: <?php echo $quests[0]['XPValue']; ?> </p>

        </div>
	</div>
    <h2 class="sectionTitle"> Available Quests </h2>
	<?php 
	// Displaying the quests list
		$ai = 0; 
		while($ai < $row_cnt) { ?>
            <?php if ($ai == 0) { ?>
    		<div class="questCircleCont selected">
            <?php } else { ?>
            <div class="questCircleCont">
            <?php }; ?>
            <div 
    		class="questCircle" 
    		data-id="<?php echo $quests[$ai]['questID']; ?>"  
    		data-name="<?php echo $quests[$ai]['Name'];?>"  
    		data-desc="<?php echo $quests[$ai]['Description']; ?>"  
    		data-icon="<?php echo $quests[$ai]['Icon']; ?>"
            data-xp="<?php echo $quests[$ai]['XPValue']; ?>" 
    		onmouseover=" 
            $('.questCircleCont').removeClass('selected')
            $(this).parent().addClass('selected')
    		x = $(this).data('icon');
    		icon = 'url(../assets/quests/' + x + ')';
    		$('.questTitle').text($(this).data('name')); 
    		$('.questDesc').text($(this).data('desc')); 
            $('.questXP').text('XP: ' + $(this).data('xp'));
    		$('.questIcon').css('background-image', icon); 
    		" 
    		style="background-image: url(../assets/quests/<?php echo $quests[$ai]['Icon']; ?>);">
    		</div>
            </div>  
    	<?php $ai++;
		} 
	?>
    <h2 class="sectionTitle"> Completed Quests </h2>
</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
