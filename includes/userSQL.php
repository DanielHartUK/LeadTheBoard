<?php 
if (isset($_SESSION['UserID'])) {
  $id = $_SESSION['UserID'];

date_default_timezone_set('UTC');

$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

// Array Usage
// $array[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

// Get the User's info into an array
$selUsers = "SELECT * FROM Users WHERE UserID='$id'";
$ur = mysqli_query($conn, $selUsers) or die(mysqli_error());
$userRowCount = $ur->num_rows;
$users = array();

while($row = mysqli_fetch_assoc($ur)) {
   $users[] = $row;
}

// Get the User's options into an array
$selUsersO = "SELECT * FROM UserOptions WHERE UserID='$id'";
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
$selClassM = "SELECT * FROM ClassMembers WHERE UserID='$id'";
$clM = mysqli_query($conn, $selClasses) or die(mysqli_error());
$classMRowCount = $clM->num_rows;
$classM = array();

while($row = mysqli_fetch_assoc($clM)) {
   $classM[] = $row;
}

// Get the Clan info into an array
$selClan = "SELECT * FROM clans";
$cla = mysqli_query($conn, $selClan) or die(mysqli_error());
$clansRowCount = $cla->num_rows;
$clans = array();

while($row = mysqli_fetch_assoc($cla)) {
   $clans[] = $row;
}

if(isset($clans[0])){
  // Get the User's clan into an array
  $selClanM = "SELECT * FROM clanmembers WHERE UserID='$id'";
  $claM = mysqli_query($conn, $selClanM) or die(mysqli_error());
  $clanMRowCount = $claM->num_rows;
  $clanM = array();

  while($row = mysqli_fetch_assoc($claM)) {
     $clanM[] = $row;
  }
};
// Achievements Available to the user
$selAchievementP = "SELECT * FROM AchievementProgress WHERE UserID='$id' ";
$acP = mysqli_query($conn, $selAchievementP) or die(mysqli_error());
$achievementPRowCount = $acP->num_rows;
$achievementP = array();

while($row = mysqli_fetch_assoc($acP)) {
   $achievementP[] = $row;
}

// Acheivements Completed by the user
$selAchievementPC = "SELECT * FROM AchievementProgress WHERE UserID='$id' AND AchievementProgress='1'";
$acPC = mysqli_query($conn, $selAchievementPC) or die(mysqli_error());
$achievementPCRowCount = $acPC->num_rows;
$achievementPC = array();

while($row = mysqli_fetch_assoc($acPC)) {
   $achievementPC[] = $row;
}

// Quests Available to the user
$selQuestsP = "SELECT * FROM QuestProgress WHERE UserID='$id' ";
$qP = mysqli_query($conn, $selQuestsP) or die(mysqli_error());
$questsPRowCount = $qP->num_rows;
$questsP = array();

while($row = mysqli_fetch_assoc($qP)) {
   $questsP[] = $row;
}

// Quests Completed by the user
$selQuestsPC = "SELECT * FROM QuestProgress WHERE UserID='$id' AND QuestProgress='1'";
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
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='1';";
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
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$id' and AchievementProgress.AchievementProgress='1';";
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
$selXPAwards = "SELECT * FROM XPAwards WHERE UserID='$id'";
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

$firstName = $users[0]['Name'];
$surname = $users[0]['Surname'];
$admin = $users[0]['Admin'];
$class = $classes[0]['Name'];
//$clan = $usersO[0]['Clan'];
if(isset($clans[0]) AND isset($clanM[0])){
  foreach ($clans as $value) {
     if ($value['ClanID'] == $clanM[0]['ClanID']) {
        $clanN = $value['Name'];
        $emblem = $value['Emblem'];
     }
  }
}
$email = $users[0]['Email'];
$unreadNotifications = 0;
$profilePic = '/assets/uploads/' . $users[0]['Avatar'];
$xp = $qXP + $aXP + $XPa; 
$userPosition = $users[0]['Position']; // Leaderboard position
$achievementsUnlocked = $achievementPCRowCount; // Achievements completed
$achievementsUnlockable = $achievementPRowCount; // Achievements available
$questsComplete = $questsPCRowCount; // Quests Compelted
$questsAvailable = $questsPRowCount; // Quests currently available
$questsAvailableAccumulation = $questsPRowCount; // All Quests that were available for this class
$userColourScheme = $usersO[0]['ColourScheme'];
$timeZone = $usersO[0]['TimeZone'];
date_default_timezone_set($timeZone);

}

