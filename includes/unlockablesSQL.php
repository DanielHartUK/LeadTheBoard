<?php 

$conn = mysqli_connect($servername, $username, $password, $dbname); // 

// Achievements XP
$sql = "SELECT AchievementProgress.UserID, AchievementProgress.AchievementProgress, Achievements.Name, Achievements.Description, Achievements.XPValue, Achievements.Icon           
FROM `AchievementProgress`
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$id' and AchievementProgress.AchievementProgress='1' ORDER BY AchievementProgress.Timestamp;";
$achievementsFullaq = mysqli_query($conn, $sql) or die(mysqli_error());
$achievementsFullaCount = $achievementsFullaq->num_rows;
$achievementsFulla = array();

while($row = mysqli_fetch_assoc($achievementsFullaq)) {
   $achievementsFulla[] = $row;
}

$sql = "SELECT AchievementProgress.UserID, AchievementProgress.AchievementProgress, Achievements.Name, Achievements.Description, Achievements.XPValue, Achievements.Icon           
FROM `AchievementProgress`
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$id' and AchievementProgress.AchievementProgress='0';";
$achievementsFullbq = mysqli_query($conn, $sql) or die(mysqli_error());
$achievementsFullbCount = $achievementsFullbq->num_rows;
$achievementsFullb = array();

while($row = mysqli_fetch_assoc($achievementsFullbq)) {
   $achievementsFullb[] = $row;
}

// Quests Completed
$sql = "SELECT QuestProgress.UserID, QuestProgress.QuestProgress, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon           
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='1' ORDER BY QuestProgress.Timestamp;";
$questsFullaq = mysqli_query($conn, $sql) or die(mysqli_error());
$questsFullaCount = $questsFullaq->num_rows;
$questsFulla = array();

while($row = mysqli_fetch_assoc($questsFullaq)) {
   $questsFulla[] = $row;
}

// Quests Available
$sql = "SELECT QuestProgress.UserID, QuestProgress.QuestProgress, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon, Quests.Expire          
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='0' and DATE(Quests.Expire)>NOW();";
$questsFullbq = mysqli_query($conn, $sql) or die(mysqli_error());
$questsFullbCount = $questsFullbq->num_rows;
$questsFullb = array();

while($row = mysqli_fetch_assoc($questsFullbq)) {
   $questsFullb[] = $row;
}

//Quests Expired
$sql = "SELECT QuestProgress.UserID, QuestProgress.QuestProgress, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon, Quests.Expire          
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='0' and DATE(Quests.Expire)<NOW();";
$questsFullcq = mysqli_query($conn, $sql) or die(mysqli_error());
$questsFullcCount = $questsFullcq->num_rows;
$questsFullc = array();

while($row = mysqli_fetch_assoc($questsFullcq)) {
   $questsFullc[] = $row;
}


// Quests Expiring
$sql = "SELECT QuestProgress.UserID, QuestProgress.QuestProgress, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon, Quests.Expire          
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='0' and DATE(Quests.Expire)>NOW() ORDER BY Quests.Expire;";
$questsFulldq = mysqli_query($conn, $sql) or die(mysqli_error());
$questsFulldCount = $questsFulldq->num_rows;
$questsFulld = array();

while($row = mysqli_fetch_assoc($questsFulldq)) {
   $questsFulld[] = $row;
}

mysqli_close($conn); // Close the connection 
