<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Array Usage
// $array[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

// Get the User's info into an array
$selUsers = "SELECT * FROM Users WHERE UserID='$profileUID'";
$ur = mysqli_query($conn, $selUsers) or die(mysqli_error());
$userRowCount = $ur->num_rows;
$users = array();

while($row = mysqli_fetch_assoc($ur)) {
   $users[] = $row;
}

// Get the User's options into an array
$selUsersO = "SELECT * FROM UserOptions WHERE UserID='$profileUID'";
$urO = mysqli_query($conn, $selUsersO) or die(mysqli_error());
$userORowCount = $urO->num_rows;
$usersO = array();

while($row = mysqli_fetch_assoc($urO)) {
   $usersO[] = $row;
}

// Get the Class info into an array
$selClasses = "SELECT * FROM Classes";
$cl = mysqli_query($conn, $selClasses) or die(mysqli_error());
$classesRowCount = $cl->num_rows;
$classes = array();

while($row = mysqli_fetch_assoc($cl)) {
   $classes[] = $row;
}

// Get the User's classes into an array
$selClassM = "SELECT * FROM ClassMemebers WHERE UserID='$profileUID'";
$clM = mysqli_query($conn, $selClasses) or die(mysqli_error());
$classMRowCount = $clM->num_rows;
$classM = array();

while($row = mysqli_fetch_assoc($clM)) {
   $classM[] = $row;
}

// Achievements Available to the user
$selAchievementP = "SELECT * FROM AchievementProgress WHERE UserID='$profileUID' ";
$acP = mysqli_query($conn, $selAchievementP) or die(mysqli_error());
$achievementPRowCount = $acP->num_rows;
$achievementP = array();

while($row = mysqli_fetch_assoc($acP)) {
   $achievementP[] = $row;
}

// Acheivements Completed by the user
$selAchievementPC = "SELECT * FROM AchievementProgress WHERE UserID='$profileUID' AND AchievementProgress='1'";
$acPC = mysqli_query($conn, $selAchievementPC) or die(mysqli_error());
$achievementPCRowCount = $acPC->num_rows;
$achievementPC = array();

while($row = mysqli_fetch_assoc($acPC)) {
   $achievementPC[] = $row;
}

// Quests Available to the user
$selQuestsP = "SELECT * FROM QuestProgress WHERE UserID='$profileUID' ";
$qP = mysqli_query($conn, $selQuestsP) or die(mysqli_error());
$questsPRowCount = $qP->num_rows;
$questsP = array();

while($row = mysqli_fetch_assoc($qP)) {
   $questsP[] = $row;
}

// Quests Completed by the user
$selQuestsPC = "SELECT * FROM QuestProgress WHERE UserID='$profileUID' AND QuestProgress='1'";
$qPC = mysqli_query($conn, $selQuestsPC) or die(mysqli_error());
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

// Achievements XP
$selAchievementsX = "SELECT AchievementProgress.UserID, Achievements.XPValue, AchievementProgress.AchievementProgress          
FROM `AchievementProgress` 
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$profileUID' and AchievementProgress.AchievementProgress='1';";
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

// Awards XP
$selXPAwards = "SELECT * FROM XPAwards WHERE UserID='$profileUID'";
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

// Achievements Unlocked
$sql = "SELECT AchievementProgress.UserID, AchievementProgress.AchievementID, AchievementProgress.AchievementProgress, Achievements.Name, Achievements.Description, Achievements.XPValue, Achievements.Icon           
FROM `AchievementProgress`
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$profileUID' and AchievementProgress.AchievementProgress='1' ORDER BY AchievementProgress.Timestamp;";
$achievementsFullaq = mysqli_query($conn, $sql) or die(mysqli_error());
$achievementsFullaCount = $achievementsFullaq->num_rows;
$achievementsFulla = array();

while($row = mysqli_fetch_assoc($achievementsFullaq)) {
   $achievementsFulla[] = $row;
}

// Quests Completed
$sql = "SELECT QuestProgress.UserID,  QuestProgress.QuestID, QuestProgress.QuestProgress, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon           
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$profileUID' and QuestProgress.QuestProgress='1' ORDER BY QuestProgress.Timestamp;";
$questsFullaq = mysqli_query($conn, $sql) or die(mysqli_error());
$questsFullaCount = $questsFullaq->num_rows;
$questsFulla = array();

while($row = mysqli_fetch_assoc($questsFullaq)) {
   $questsFulla[] = $row;
}

mysqli_close($conn); // Close the connection 

$ProfileFirstName = $users[0]['Name'];
$ProfileSurname = $users[0]['Surname'];
$ProfileAdmin = $users[0]['Admin'];
$ProfileClass = $classes[0]['Name'];
$ProfileClan = $usersO[0]['Clan'];
$ProfileUnreadNotifications = 0;
$ProfileProfilePic = '/assets/uploads/' . $users[0]['Avatar'];
$ProfileXp = $qXP + $aXP + $XPa; 
$ProfileUserPosition = $users[0]['Position']; // Leaderboard position
$ProfileAchievementsUnlocked = $achievementPCRowCount; // Achievements completed
$ProfileAchievementsUnlockable = $achievementPRowCount; // Achievements available
$ProfileQuestsComplete = $questsPCRowCount; // Quests Compelted
$ProfileQuestsAvailable = $questsPRowCount; // Quests currently available
$ProfileQuestsAvailableAccumulation = $questsPRowCount; // All Quests that were available for this class
$ProfileUserColourScheme = $usersO[0]['ColourScheme'];


