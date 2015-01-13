<?php 
require_once("config.php");
  
// Create connection
$conn = mysql_connect($servername, $username, $password);


$DBa = "CREATE TABLE `Achievement Progress` (
  `User ID` int(32) unsigned NOT NULL,
  `Achievement ID` int(32) unsigned NOT NULL,
  `Achievement Progress` int(3) unsigned NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`User ID`),
  KEY `Achievement` (`Achievement ID`),
  CONSTRAINT `Achievements` FOREIGN KEY (`Achievement ID`) REFERENCES `Achievements` (`Achievement ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB ";

$DBb = "CREATE TABLE `Achievements` (
  `Achievement ID` int(32) unsigned NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `XP Value` int(11) NOT NULL,
  PRIMARY KEY (`Achievement ID`)
) ENGINE=InnoDB ";

$DBc = "CREATE TABLE `Class Members` (
  `User ID` int(32) unsigned NOT NULL,
  `Class ID` int(32) unsigned NOT NULL,
  PRIMARY KEY (`User ID`),
  KEY `Classes` (`Class ID`),
  CONSTRAINT `Classes` FOREIGN KEY (`Class ID`) REFERENCES `Classes` (`Class ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB ";

$DBd = "CREATE TABLE `Classes` (
  `Class ID` int(32) unsigned NOT NULL,
  `Name` text NOT NULL,
  KEY `Classes` (`Class ID`)
) ENGINE=InnoDB ";

$DBe = "CREATE TABLE `Quest Progress` (
  `User ID` int(32) unsigned NOT NULL,
  `Quest ID` int(32) unsigned NOT NULL,
  `Quest Progress` int(3) unsigned NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`User ID`),
  KEY `Quests` (`Quest ID`),
  CONSTRAINT `Quests` FOREIGN KEY (`Quest ID`) REFERENCES `Quests` (`Quests ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB ";

$DBf = "CREATE TABLE `Quests` (
  `Quests ID` int(32) unsigned NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `XP Value` int(11) NOT NULL,
  PRIMARY KEY (`Quests ID`)
) ENGINE=InnoDB ";

$DBg = "CREATE TABLE `User Options` (
  `User ID` int(32) unsigned NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `Colour Scheme` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`User ID`)
) ENGINE=InnoDB ";

$DBh = "CREATE TABLE `Users` (
  `User ID` int(32) unsigned NOT NULL,
  `First Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Email` text NOT NULL,
  `XP` bigint(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`User ID`),
  CONSTRAINT `Quest Progress` FOREIGN KEY (`User ID`) REFERENCES `Achievement Progress` (`User ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Achievement Progress` FOREIGN KEY (`User ID`) REFERENCES `Achievement Progress` (`User ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `User Options` FOREIGN KEY (`User ID`) REFERENCES `User Options` (`User ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB ";



mysql_select_db($dbname);


$retval = mysql_query( $DBb, $conn );
$retval = mysql_query( $DBd, $conn );
$retval = mysql_query( $DBf, $conn );
$retval = mysql_query( $DBg, $conn );
$retval = mysql_query( $DBa, $conn );
$retval = mysql_query( $DBc, $conn );
$retval = mysql_query( $DBe, $conn );
$retval = mysql_query( $DBh, $conn );

if(! $retval )
{
  die('Could not create table: ' . mysql_error());
}
echo "It worked!\n";
mysql_close($conn);
