<?php 
//$conn = mysqli_connect($servername, $username, $password, $dbname); // 
//
//$sql = "SELECT Users.UserID, Users.Name, Users.Surname, Users.Avatar, ClassMembers.ClassID, Users.Admin
//FROM `Users`
//INNER JOIN `ClassMembers` on ClassMembers.UserID = Users.UserID WHERE ClassMembers.ClassID='$classID' AND Users.Admin='0'";
//$leaderboardq = mysqli_query($conn, $sql) or die(mysqli_error());
//$leaderboardCount = $leaderboardq->num_rows;
//$leaderboarda = array();
//
//while($row = mysqli_fetch_assoc($leaderboardq)) {
//   $leaderboarda[] = $row;
//}
//
//
//
//$selQuestX = "SELECT QuestProgress.UserID, Quests.XPValue, QuestProgress.QuestProgress          
//FROM `QuestProgress` 
//INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='1';";
//$qX = mysqli_query($conn, $selQuestX) or die(mysqli_error());
//$questsXCount = $qX->num_rows;
//$questsX = array();
//
//while($row = mysqli_fetch_assoc($qX)) {
//   $questsX[] = $row;
//}
//$count = 0;
//$qXP = 0;
//while($count < $questsXCount) {
//	$qXP = $qXP + $questsX[$count]['XPValue'];
//	$count++;
//};
//
//// Achievements XP
//$selAchievementsX = "SELECT AchievementProgress.UserID, Achievements.XPValue, AchievementProgress.AchievementProgress          
//FROM `AchievementProgress` 
//INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$id' and AchievementProgress.AchievementProgress='1';";
//$aX = mysqli_query($conn, $selAchievementsX) or die(mysqli_error());
//$achievementsXCount = $aX->num_rows;
//$achievementsX = array();
//
//while($row = mysqli_fetch_assoc($aX)) {
//   $achievementsX[] = $row;
//}
//$count = 0;
//$aXP = 0;
//while($count < $achievementsXCount) {
//	$aXP = $aXP + $achievementsX[$count]['XPValue'];
//	$count++;
//};
//
//// Awards XP
//$selXPAwards = "SELECT * FROM XPAwards WHERE UserID='$id'";
//$xpA = mysqli_query($conn, $selXPAwards) or die(mysqli_error());
//$XPAwardRowCount = $xpA->num_rows;
//$XPAwards = array();
//while($row = mysqli_fetch_assoc($xpA)) {
//   $xpAwards[] = $row;
//}
//$count = 0;
//$XPa = 0;
//while($count < $XPAwardRowCount) {
//	$XPa = $XPa + $xpAwards[$count]['XP'];
//	$count++;
//};
//mysqli_close($conn); // Close the connection 

