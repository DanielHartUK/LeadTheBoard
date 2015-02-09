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
                                    <span class="pie-info"><div class="flaticon-trophy56"></div></span>
                                </div>
                            </div>
                        </div><!--End Chart -->
                    </div>
                    <div class="totals" >Total achievements unlocked: <br /> <span><?php echo $achievementsUnlocked ." / ". $achievementsAvailable ?></span></div>
                    <div class="topStudents">
                        <h5> Top Students </h5>
                        <?php $s = 0; while($s < 3) { ?> 
                        <div class="student">
                            <div class="pos"><?php echo $s + 1; ?></div><div class="topStudentDetails">
                                <img class="avatar">
                                <h4> Name </h4>
                                <p><span class="flaticon-trophy56"></span> 10 </p>
                            </div>
                        </div>
                        <?php $s++; } ?>
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
                                    <span class="pie-info"><div class="flaticon-pencil43"></div></span>
                                </div>
                            </div>
                        </div><!--End Chart -->
                    </div>
                    <div class="totals" >Total quests completed: <br /> <span><?php echo $questsComplete ." / ". $questsAvailable; ?></span></div>
                    <div class="topStudents">
                        <h5> Top Students </h5>
                        <?php $s = 0; while($s < 3) { ?> 
                        <div class="student">
                            <div class="pos"><?php echo $s + 1; ?></div><div class="topStudentDetails">
                                <img class="avatar">
                                <h4> Name </h4>
                                <p><span class="flaticon-pencil43"></span> 10 </p>
                            </div>
                        </div>
                        <?php $s++; } ?>
                    </div>  
                </div>
            </div><div class="stats xp">
                <div class="progressDiv">
                    <div class="statChartHolder">
                        <div class="progress-pie-chart progress-pie-chart2" data-percent="<?php echo $totalXP / $possibleXP * 100; ?>"><!--Pie Chart -->
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
                    <div class="totals" >Total XP earned: <br /> <span><?php echo $totalXP ." / ". $possibleXP; ?></span></div>
                    <div class="topStudents">
                        <h5> Top Students </h5>
                        <?php $s = 0; while($s < 3) { ?> 
                        <div class="student">
                            <div class="pos"><?php echo $s + 1; ?></div><div class="topStudentDetails">
                                <img class="avatar">
                                <h4> Name </h4>
                                <p><span class="flaticon-medal61"></span> 10 </p>
                            </div>
                        </div>
                        <?php $s++; } ?>
                    </div>  
                </div>
            </div>

        </div><!-- End Stats cont -->

    </div>
<?php 
}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


