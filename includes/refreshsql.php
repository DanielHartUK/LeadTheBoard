<?php 
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection


// $c = Number of non admin users 
$usersNoSQL = "SELECT * FROM Users WHERE Admin='0'";
$usersNoQ =  mysqli_query($conn, $usersNoSQL) or die(mysqli_error());
$usersNo = $usersNoQ->num_rows;
$usersNoA = array();
while($row = mysqli_fetch_assoc($usersNoQ)) {
   $usersNoA[] = $row;
}


$ai = 0;
while($ai < $usersNo) {
	$idOfUserR = $usersNoA[$ai]['UserID'];

	$selQuestX = "SELECT QuestProgress.UserID, Quests.XPValue, QuestProgress.QuestProgress          
	FROM `QuestProgress` 
	INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$idOfUserR' and QuestProgress.QuestProgress='1';";
	$qX = mysqli_query($conn, $selQuestX) or die(mysqli_error());
	$questsXCount = $qX->num_rows;
	$questsX = array();
	
	while($row = mysqli_fetch_assoc($qX)) {
	   $questsX[] = $row;
	}
	$count = 0;
	$qXP = 0;
	while($count < $questsXCount) {
		$qXP = $qXP + $questsX[$count]['XPValue'];
		$count++;
	};

	$selAchievementsX = "SELECT AchievementProgress.UserID, Achievements.XPValue, AchievementProgress.AchievementProgress          
	FROM `AchievementProgress` 
	INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$idOfUserR' and AchievementProgress.AchievementProgress='1';";
	$aX = mysqli_query($conn, $selAchievementsX) or die(mysqli_error());
	$achievementsXCount = $aX->num_rows;
	$achievementsX = array();

	while($row = mysqli_fetch_assoc($aX)) {
	   $achievementsX[] = $row;
	}
	$count = 0;
	$aXP = 0;
	while($count < $achievementsXCount) {
		$aXP = $aXP + $achievementsX[$count]['XPValue'];
		$count++;
	};

	$selXPAwards = "SELECT * FROM XPAwards WHERE UserID='$idOfUserR'";
	$xpA = mysqli_query($conn, $selXPAwards) or die(mysqli_error());
	$XPAwardRowCount = $xpA->num_rows;
	$XPAwards = array();
	while($row = mysqli_fetch_assoc($xpA)) {
	   $xpAwards[] = $row;
	}
	$count = 0;
	$XPa = 0;
	while($count < $XPAwardRowCount) {
		$XPa = $XPa + $xpAwards[$count]['XP'];
		$count++;
	};

	$xpTotal = $qXP + $aXP + $XPa;

	$xpUpdateSQL = "UPDATE Users SET XP='$xpTotal' WHERE UserID='$idOfUserR'";
	$xpUpdateSQLQ = mysqli_query($conn, $xpUpdateSQL) or die(mysqli_error());

	$ai++;
}




mysqli_close($conn); 


