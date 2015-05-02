<?php session_start();
$isOverview = 1;
require_once("../../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
include_once(INCLUDES_PATH . "/dashboard.php"); 

if ($admin == 0) {
    include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} else {

$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

$SQL = "SELECT UserID, Count(*) AS `AchNum` FROM AchievementProgress WHERE AchievementProgress='1' AND ClassID='$selectedClass' GROUP BY UserID ORDER BY AchNum DESC" ;
$query = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
$topachRowCount = $query->num_rows;
if ($topachRowCount >= 5) {
    $achWhileCount = 5;
} else {
    $achWhileCount = $topachRowCount;
}
$topach = array();
while($row = mysqli_fetch_assoc($query)) {
   $topach[] = $row;
} 

$SQL = "SELECT UserID, Count(*) AS `QueNum` FROM QuestProgress WHERE QuestProgress='1' AND ClassID='$selectedClass' GROUP BY UserID ORDER BY QueNum DESC" ;
$query = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
$topqueRowCount = $query->num_rows;
if ($topqueRowCount >= 5) {
    $queWhileCount = 5;
} else {
    $queWhileCount = $topqueRowCount;
}
$topque = array();
while($row = mysqli_fetch_assoc($query)) {
   $topque[] = $row;
} 

$sql = "SELECT Users.Name, Users.Surname, Users.Avatar, Users.Admin, UserStats.*       
FROM `Users`
INNER JOIN `UserStats` on Users.UserID = UserStats.UserID WHERE UserStats.ClassID = '$selectedClass' ORDER BY XP DESC ";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$topxpRowCount = $query->num_rows;
if ($topxpRowCount >= 5) {
    $xpWhileCount = 5;
} else {
    $xpWhileCount = $topxpRowCount;
}
$topxp = array();
while($row = mysqli_fetch_assoc($query)) {
   $topxp[] = $row;
} 
?>

    <div class="content">
        <h1> Dashboard </h1>
        <?php require_once(TEMPLATES_PATH . "/dashboardNav.php"); ?>
        <div class="statsCont dashboard">
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
                        <?php $s = 0; 
                        while($s < $achWhileCount) {  
                            $stuUID = $topach[$s]['UserID'];
                            $selUsers = "SELECT * FROM Users WHERE UserID='$stuUID'";
                            $ur = mysqli_query($conn, $selUsers) or die(mysqli_error($conn));
                            $users = array();

                            while($row = mysqli_fetch_assoc($ur)) {
                               $users[] = $row;
                            }
                        ?>
                        <div class="student">
                            <div class="pos"><?php echo $s + 1; ?></div><div class="topStudentDetails">
                                <img class="avatar" src="<?php echo '/assets/uploads/' . $users[0]['Avatar']; ?>">
                                <h4> <?php echo $users[0]['Name'] . " " . $users[0]['Surname']; ?> </h4>
                                <p><span class="flaticon-trophy56"></span> <?php echo $topach[$s]['AchNum']; ?> </p>
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
                        <?php $s = 0; 
                        while($s < $queWhileCount) {  
                            $stuUID = $topque[$s]['UserID'];
                            $selUsers = "SELECT * FROM Users WHERE UserID='$stuUID'";
                            $ur = mysqli_query($conn, $selUsers) or die(mysqli_error($conn));
                            $users = array();

                            while($row = mysqli_fetch_assoc($ur)) {
                               $users[] = $row;
                            }
                        ?>
                        <div class="student">
                            <div class="pos"><?php echo $s + 1; ?></div><div class="topStudentDetails">
                                <img class="avatar" src="<?php echo '/assets/uploads/' . $users[0]['Avatar']; ?>">
                                <h4> <?php echo $users[0]['Name'] . " " . $users[0]['Surname']; ?> </h4>
                                <p><span class="flaticon-pencil43"></span> <?php echo $topque[$s]['QueNum']; ?> </p>
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
                        <?php $s = 0; 
                        while($s < $xpWhileCount) {  
                        ?>
                        <div class="student">
                            <div class="pos"><?php echo $s + 1; ?></div><div class="topStudentDetails">
                                <img class="avatar" src="<?php echo '/assets/uploads/' . $topxp[$s]['Avatar']; ?>">
                                <h4> <?php echo $topxp[$s]['Name'] . " " . $topxp[$s]['Surname']; ?> </h4>
                                <p><span class="flaticon-medal61"></span> <?php echo $topxp[$s]['XP']; ?> </p>
                            </div>
                        </div>
                        <?php $s++; } ?>
                    </div> 
                </div>
            </div>

        </div><!-- End Stats cont -->

    </div>
<?php 
mysqli_close($conn); // Close the connection 

}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


