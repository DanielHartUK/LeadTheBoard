<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Array Usage
// $array[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

// Get the user's info into an array
$selUsers = "SELECT * FROM Users WHERE UserID='$profileUID'";
$ur = mysqli_query($conn, $selUsers) or die(mysqli_error($conn));
$userRowCount = $ur->num_rows;
$users = array();

while($row = mysqli_fetch_assoc($ur)) {
   $users[] = $row;
}

// Get the user's options into an array
$selUsersO = "SELECT * FROM UserOptions WHERE UserID='$profileUID'";
$urO = mysqli_query($conn, $selUsersO) or die(mysqli_error($conn));
$userORowCount = $urO->num_rows;
$usersO = array();

while($row = mysqli_fetch_assoc($urO)) {
   $usersO[] = $row;
}
// Get the user's clan into an array
$selClan = "SELECT clanmembers.ClanID, clanmembers.UserID, clans.ClanID, clans.Name
FROM clanmembers
INNER JOIN clans on clanmembers.ClanID = clans.ClanID WHERE UserID='$profileUID'";
$clanq = mysqli_query($conn, $selClan) or die(mysqli_error($conn));
$clanRowCount = $clanq->num_rows;
$clan = array();

while($row = mysqli_fetch_assoc($clanq)) {
   $clan[] = $row;
}

// Get the class info into an array
$selClasses = "SELECT * FROM Classes";
$cl = mysqli_query($conn, $selClasses) or die(mysqli_error($conn));
$classesRowCount = $cl->num_rows;
$classes = array();

while($row = mysqli_fetch_assoc($cl)) {
   $classes[] = $row;
}

// Get the user's classes into an array
$selClassM = "SELECT * FROM ClassMemebers WHERE UserID='$profileUID'";
$clM = mysqli_query($conn, $selClasses) or die(mysqli_error($conn));
$classMRowCount = $clM->num_rows;
$classM = array();

while($row = mysqli_fetch_assoc($clM)) {
   $classM[] = $row;
}

// Achievements available to the user
$selAchievementP = "SELECT * FROM AchievementProgress WHERE UserID='$profileUID' ";
$acP = mysqli_query($conn, $selAchievementP) or die(mysqli_error($conn));
$achievementPRowCount = $acP->num_rows;
$achievementP = array();

while($row = mysqli_fetch_assoc($acP)) {
   $achievementP[] = $row;
}

// Acheivements completed by the user
$selAchievementPC = "SELECT * FROM AchievementProgress WHERE UserID='$profileUID' AND AchievementProgress='1'";
$acPC = mysqli_query($conn, $selAchievementPC) or die(mysqli_error($conn));
$achievementPCRowCount = $acPC->num_rows;
$achievementPC = array();

while($row = mysqli_fetch_assoc($acPC)) {
   $achievementPC[] = $row;
}

// Quests available to the user
$selQuestsP = "SELECT * FROM QuestProgress WHERE UserID='$profileUID' ";
$qP = mysqli_query($conn, $selQuestsP) or die(mysqli_error($conn));
$questsPRowCount = $qP->num_rows;
$questsP = array();

while($row = mysqli_fetch_assoc($qP)) {
   $questsP[] = $row;
}

// Quests completed by the user
$selQuestsPC = "SELECT * FROM QuestProgress WHERE UserID='$profileUID' AND QuestProgress='1'";
$qPC = mysqli_query($conn, $selQuestsPC) or die(mysqli_error($conn));
$questsPCRowCount = $qPC->num_rows;
$questsPC = array();

while($row = mysqli_fetch_assoc($qPC)) {
   $questsPC[] = $row;
}

// Calculating XP
// Quest XP
$selQuestX = "SELECT QuestProgress.UserID, Quests.XPValue, QuestProgress.QuestProgress          
FROM `QuestProgress` 
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$profileUID' and QuestProgress.QuestProgress='1';";
$qX = mysqli_query($conn, $selQuestX) or die(mysqli_error($conn));
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

// Achievements XP
$selAchievementsX = "SELECT AchievementProgress.UserID, Achievements.XPValue, AchievementProgress.AchievementProgress          
FROM `AchievementProgress` 
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$profileUID' and AchievementProgress.AchievementProgress='1';";
$aX = mysqli_query($conn, $selAchievementsX) or die(mysqli_error($conn));
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

// Possible Quest XP
$selQuestPosX = "SELECT QuestProgress.UserID, Quests.XPValue, QuestProgress.QuestProgress          
FROM `QuestProgress` 
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$profileUID';";
$qXp = mysqli_query($conn, $selQuestPosX) or die(mysqli_error($conn));
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

// Possible Achievements XP
$selAchievementsPosX = "SELECT AchievementProgress.UserID, Achievements.XPValue, AchievementProgress.AchievementProgress          
FROM `AchievementProgress` 
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$profileUID';";
$aXp = mysqli_query($conn, $selAchievementsPosX) or die(mysqli_error($conn));
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
$selXPAwards = "SELECT * FROM XPAwards WHERE UserID='$profileUID'";
$xpA = mysqli_query($conn, $selXPAwards) or die(mysqli_error($conn));
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
$ProfileXp = $qXP + $aXP + $XPa; 


// Achievements unlocked
$sql = "SELECT AchievementProgress.UserID, AchievementProgress.AchievementID, AchievementProgress.AchievementProgress, Achievements.Name, Achievements.Description, Achievements.XPValue, Achievements.Icon           
FROM `AchievementProgress`
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$profileUID' and AchievementProgress.AchievementProgress='1' ORDER BY AchievementProgress.Timestamp;";
$achievementsFullaq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$achievementsFullaCount = $achievementsFullaq->num_rows;
$achievementsFulla = array();

while($row = mysqli_fetch_assoc($achievementsFullaq)) {
   $achievementsFulla[] = $row;
}

// Quests completed
$sql = "SELECT QuestProgress.UserID,  QuestProgress.QuestID, QuestProgress.QuestProgress, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon           
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$profileUID' and QuestProgress.QuestProgress='1' ORDER BY QuestProgress.Timestamp;";
$questsFullaq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$questsFullaCount = $questsFullaq->num_rows;
$questsFulla = array();

while($row = mysqli_fetch_assoc($questsFullaq)) {
   $questsFulla[] = $row;
}





mysqli_close($conn); // Close the connection 

$ProfileFirstName = $users[0]['Name'];
$ProfileSurname = $users[0]['Surname'];
$ProfileAdmin = $users[0]['Admin'];
if( empty( $clan[0]['Name'] ) ) {
   $ProfileClan = '';
} else {
   $ProfileClan = $clan[0]['Name'];
}
$ProfileClass = $classes[0]['Name'];
$ProfileUnreadNotifications = 0;
$ProfileProfilePic = '/assets/uploads/' . $users[0]['Avatar'];
$ProfileUserPosition = $users[0]['Position']; // Leaderboard position
$ProfileAchievementsUnlocked = $achievementPCRowCount; // Achievements completed
$ProfileAchievementsUnlockable = $achievementPRowCount; // Achievements available
$ProfileQuestsComplete = $questsPCRowCount; // Quests Compelted
$ProfileQuestsAvailable = $questsPRowCount; // Quests currently available
$ProfileQuestsAvailableAccumulation = $questsPRowCount; // All Quests that were available for this class
$ProfileUserColourScheme = $usersO[0]['ColourScheme'];
$possibleXP = $qpXP + $apXP + $XPa; 
$totalXP = $qXP + $aXP + $XPa; 

