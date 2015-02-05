<?php 
$isOverview = 1;
require_once("../../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
include_once(INCLUDES_PATH . "/dashboard.php"); 

if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} else {
?>

	<div class="content">
		<h1> Dashboard </h1>
		<?php require_once(TEMPLATES_PATH . "/dashboardNav.php"); ?>

		<div class="statsCont">
			<div class="stats achievements">
                <div class="progressDiv">
                    <div class="statChartHolder">
                        <div class="progress-pie-chart progress-pie-chart0" data-percent="<?php echo $achievementsUnlocked / $achievementsAvailable * 100; ?>"><!--Pie Chart -->
                            <div class="ppc-progress ppc-progress0">
                                <div class="ppc-progress-fill ppc-progress-fill0"></div>
                            </div>
                            <div class="ppc-percents ppc-percents0">
                                <div class="pcc-percents-wrapper pcc-percents-wrapper0">
                                    <span class="pie-info">Overall Achievement Progress: </span><br > <span class="pie-percent"><?php echo $achievementsUnlocked ." / ". $achievementsAvailable ?></span>
                                </div>
                            </div>
                        </div><!--End Chart -->
                    </div>
                </div>
			</div><div class="stats quests">
                <div class="progressDiv">
                    <div class="statChartHolder">
                        <div class="progress-pie-chart progress-pie-chart1" data-percent="<?php echo $questsComplete / $questsAvailable * 100; ?>"><!--Pie Chart -->
                            <div class="ppc-progress ppc-progress1">
                                <div class="ppc-progress-fill ppc-progress-fill1"></div>
                            </div>
                            <div class="ppc-percents ppc-percents1">
                                <div class="pcc-percents-wrapper pcc-percents-wrapper1">
                                    <span class="pie-info">Overall Quest Progress: </span><br > <span class="pie-percent"><?php echo $questsComplete ." / ". $questsAvailable; ?></span>
                                </div>
                            </div>
                        </div><!--End Chart -->
                    </div>
                </div>
            </div><div class="stats xp">
                <div class="flaticon-medal61"></div><p>Total XP <br /> <?php echo $totalXP; ?></p>
            </div>
        </div>

    </div>
<?php 
}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


