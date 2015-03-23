<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Array Usage
// $array[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

// Achievements Available 
$selAchievementP = "SELECT * FROM AchievementProgress ";
$acP = mysqli_query($conn, $selAchievementP) or die(mysqli_error());
$achievementsAvailable = $acP->num_rows;
$achievementP = array();

while($row = mysqli_fetch_assoc($acP)) {
   $achievementP[] = $row;
}

// Acheivements Completed
$selAchievementPC = "SELECT * FROM AchievementProgress WHERE AchievementProgress='1'";
$acPC = mysqli_query($conn, $selAchievementPC) or die(mysqli_error());
$achievementsUnlocked = $acPC->num_rows;
$achievementPC = array();

while($row = mysqli_fetch_assoc($acPC)) {
   $achievementPC[] = $row;
}

// Quests Available
$selQuestsP = "SELECT * FROM QuestProgress ";
$qP = mysqli_query($conn, $selQuestsP) or die(mysqli_error());
$questsAvailable = $qP->num_rows;
$questsP = array();

while($row = mysqli_fetch_assoc($qP)) {
   $questsP[] = $row;
}

// Quests Completed 
$selQuestsPC = "SELECT * FROM QuestProgress WHERE QuestProgress='1'";
$qPC = mysqli_query($conn, $selQuestsPC) or die(mysqli_error());
$questsComplete = $qPC->num_rows;
$questsPC = array();

while($row = mysqli_fetch_assoc($qPC)) {
   $questsPC[] = $row;
}

// Calculating XP
// Quest XP
$selQuestX = "SELECT QuestProgress.UserID, Quests.XPValue, QuestProgress.QuestProgress          
FROM `QuestProgress` 
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.QuestProgress='1';";
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
// Possible Quest XP
$selQuestPosX = "SELECT QuestProgress.UserID, Quests.XPValue, QuestProgress.QuestProgress          
FROM `QuestProgress` 
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID;";
$qXp = mysqli_query($conn, $selQuestPosX) or die(mysqli_error());
$questsXpCount = $qXp->num_rows;
$questsXp = array();

while($row = mysqli_fetch_assoc($qXp)) {
   $questsXp[] = $row;
}
$count = 0;
$qpXP = 0;
while($count < $questsXpCount) {
   $qpXP = $qpXP + $questsXp[$count]['XPValue'];
   $count++;
};


// Achievements XP
$selAchievementsX = "SELECT AchievementProgress.UserID, Achievements.XPValue, AchievementProgress.AchievementProgress          
FROM `AchievementProgress` 
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.AchievementProgress='1';";
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

// Possible Achievements XP
$selAchievementsPosX = "SELECT AchievementProgress.UserID, Achievements.XPValue, AchievementProgress.AchievementProgress          
FROM `AchievementProgress` 
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID;";
$aXp = mysqli_query($conn, $selAchievementsPosX) or die(mysqli_error());
$achievementsXpCount = $aXp->num_rows;
$achievementsXp = array();

while($row = mysqli_fetch_assoc($aXp)) {
   $achievementsXp[] = $row;
}
$count = 0;
$apXP = 0;
while($count < $achievementsXpCount) {
   $apXP = $apXP + $achievementsXp[$count]['XPValue'];
   $count++;
};

// Awards XP
$selXPAwards = "SELECT * FROM XPAwards ";
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



mysqli_close($conn); // Close the connection 

$possibleXP = $qpXP + $apXP + $XPa; 
$totalXP = $qXP + $aXP + $XPa; 

