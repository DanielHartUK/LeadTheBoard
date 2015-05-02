<?php 

$conn = mysqli_connect($servername, $username, $password, $dbname); // 

// Achievements 
$sql = "SELECT Users.UserID, Users.Name, Users.Surname, Users.Avatar, AchievementProgress.*, Achievements.AchievementID, Achievements.Name as aName, Achievements.Description, Achievements.XPValue, Achievements.Icon, UserOptions.UserID, UserOptions.ColourScheme
FROM Users
    JOIN AchievementProgress
        ON AchievementProgress.UserID = Users.UserID
    JOIN UserOptions
        ON Users.UserID = UserOptions.UserID
    JOIN Achievements
        ON Achievements.AchievementID = AchievementProgress.AchievementID
WHERE AchievementProgress.AchievementProgress = 1 ORDER BY AchievementProgress.Timestamp;";
$achievementsFullaq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$achievementsFullaCount = $achievementsFullaq->num_rows;
$achievementsFulla = array();

while($row = mysqli_fetch_assoc($achievementsFullaq)) {
   $achievementsFulla[] = $row;
}

// Quests 
$sql = "SELECT Users.UserID, Users.Name, Users.Surname, Users.Avatar, QuestProgress.*, Quests.QuestID, Quests.Name as qName, Quests.Description, Quests.XPValue, Quests.Icon, UserOptions.UserID, UserOptions.ColourScheme
FROM Users
    JOIN QuestProgress
        ON QuestProgress.UserID = Users.UserID
    JOIN UserOptions
        ON Users.UserID = UserOptions.UserID
    JOIN Quests
        ON Quests.QuestID = QuestProgress.QuestID
WHERE QuestProgress.QuestProgress = 1  ORDER BY QuestProgress.Timestamp;";
$questsFullaq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$questsFullaCount = $questsFullaq->num_rows;
$questsFulla = array();

while($row = mysqli_fetch_assoc($questsFullaq)) {
   $questsFulla[] = $row;
}

// XP Awards
$sql = "SELECT Users.UserID, Users.Name, Users.Surname, Users.Avatar, UserOptions.UserID, UserOptions.ColourScheme, XPAwards.*
FROM Users
    JOIN XPAwards
        ON XPAwards.UserID = Users.UserID
    JOIN UserOptions
        ON Users.UserID = UserOptions.UserID
ORDER BY XPAwards.Timestamp;";
$xpAFullaq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$xpAFullaCount = $xpAFullaq->num_rows;
$xpAFulla = array();

while($row = mysqli_fetch_assoc($xpAFullaq)) {
   $xpAFulla[] = $row;
}

mysqli_close($conn); // Close the connection 
