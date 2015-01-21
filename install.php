<?php 
require_once("config.php");
  
// Create connection
$conn = mysql_connect($servername, $username, $password);


$DBa = "CREATE TABLE `AchievementProgress` (
  `UserID` int(32) unsigned NOT NULL,
  `AchievementID` int(32) unsigned NOT NULL,
  `AchievementProgress` int(3) unsigned NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `Achievements` (`AchievementID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `Achievement Progress` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Achievements` FOREIGN KEY (`AchievementID`) REFERENCES `Achievements` (`AchievementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ";

$DBb = "CREATE TABLE `Achievements` (
  `AchievementID` int(32) unsigned NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `XPValue` int(11) NOT NULL,
  `Icon` text NOT NULL,
  PRIMARY KEY (`AchievementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; ";

$DBc = "CREATE TABLE `ClassMembers` (
  `UserID` int(32) unsigned NOT NULL,
  `ClassID` int(32) unsigned DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  KEY `Classes` (`ClassID`),
  CONSTRAINT `Class Members` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Classes` FOREIGN KEY (`ClassID`) REFERENCES `Classes` (`ClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ";

$DBd = "CREATE TABLE `Classes` (
  `ClassID` int(32) unsigned NOT NULL,
  `Name` text NOT NULL,
  PRIMARY KEY (`ClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ";

$DBe = "CREATE TABLE `QuestProgress` (
  `UserID` int(32) unsigned NOT NULL,
  `QuestID` int(32) unsigned NOT NULL,
  `QuestProgress` int(3) unsigned NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `Quests` (`QuestID`),
  KEY `Quests Progress` (`UserID`),
  CONSTRAINT `Quests` FOREIGN KEY (`QuestID`) REFERENCES `Quests` (`QuestID`),
  CONSTRAINT `Quests Progress` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ";

$DBf = "CREATE TABLE `Quests` (
  `QuestID` int(32) unsigned NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `XPValue` int(11) NOT NULL,
  `Icon` text NOT NULL,
  `Expire` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`QuestID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$DBg = "CREATE TABLE `UserOptions` (
  `UserID` int(32) unsigned NOT NULL,
  `ColourScheme` tinyint(1) NOT NULL DEFAULT '0',
  `TimeZone` text NOT NULL,
  `Clan` text NOT NULL,
  PRIMARY KEY (`UserID`),
  CONSTRAINT `User Options` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$DBh = "CREATE TABLE `Users` (
  `UserID` int(32) unsigned NOT NULL,
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Email` text NOT NULL,
  `Avatar` text NOT NULL,
  `Admin` tinyint(1) DEFAULT '0',
  `XP` int(255) DEFAULT '0',
  `Position` int(255) DEFAULT NULL,
  `Password` text,
  `Salt` text,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ";

$DBi = "CREATE TABLE `XPAwards` (
  `UserID` int(32) unsigned NOT NULL,
  `XP` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `XP` (`UserID`),
  CONSTRAINT `XP` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1";


mysql_select_db($dbname);


$retval = mysql_query( $DBb, $conn );
$retval = mysql_query( $DBd, $conn );
$retval = mysql_query( $DBf, $conn );
$retval = mysql_query( $DBg, $conn );
$retval = mysql_query( $DBa, $conn );
$retval = mysql_query( $DBc, $conn );
$retval = mysql_query( $DBe, $conn );
$retval = mysql_query( $DBh, $conn );
$retval = mysql_query( $DBi, $conn );

if(! $retval )
{
  die('Could not create table: ' . mysql_error());
}
echo 'Achievement Unlocked: LeadTheBoard! successfully installed! <a href="/">Continue</a>';
mysql_close($conn);
