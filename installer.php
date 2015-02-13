<?php 
require_once("config.php");

$createSuccess = false;
$sampleSuccess = false;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
	


if (isset($_GET['create'])) {
	mysqli_query($conn, "
	CREATE TABLE `Achievements` (
	  `AchievementID` int(32) unsigned NOT NULL,
	  `Name` text NOT NULL,
	  `Description` text NOT NULL,
	  `XPValue` int(11) NOT NULL,
	  `Icon` text NOT NULL,
	  PRIMARY KEY (`AchievementID`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	
	mysqli_query($conn, "
	CREATE TABLE `Classes` (
	  `ClassID` int(32) unsigned NOT NULL,
	  `Name` text NOT NULL,
	  PRIMARY KEY (`ClassID`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));

	mysqli_query($conn, "
	CREATE TABLE IF NOT EXISTS `clans` (
	  `ClanID` int(11) NOT NULL AUTO_INCREMENT,
	  `Name` text NOT NULL,
	  `Emblem` text NOT NULL,
	  PRIMARY KEY (`ClanID`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	mysqli_query($conn, "
	CREATE TABLE `Quests` (
	  `QuestID` int(32) unsigned NOT NULL,
	  `Name` text NOT NULL,
	  `Description` text NOT NULL,
	  `XPValue` int(11) NOT NULL,
	  `Icon` text NOT NULL,
	  `Expire` timestamp NULL DEFAULT NULL,
	  PRIMARY KEY (`QuestID`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	
	mysqli_query($conn, "
	CREATE TABLE `Users` (
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
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	
	mysqli_query($conn, "
	CREATE TABLE `AchievementProgress` (
	  `UserID` int(32) unsigned NOT NULL,
	  `AchievementID` int(32) unsigned NOT NULL,
	  `AchievementProgress` int(3) unsigned NOT NULL,
	  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  KEY `Achievements` (`AchievementID`),
	  KEY `UserID` (`UserID`),
	  CONSTRAINT `Achievement Progress` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `Achievements` FOREIGN KEY (`AchievementID`) REFERENCES `Achievements` (`AchievementID`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	
	mysqli_query($conn, "
	CREATE TABLE `ClassMembers` (
	  `UserID` int(32) unsigned NOT NULL,
	  `ClassID` int(32) unsigned DEFAULT NULL,
	  PRIMARY KEY (`UserID`),
	  KEY `Classes` (`ClassID`),
	  CONSTRAINT `Class Members` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `Classes` FOREIGN KEY (`ClassID`) REFERENCES `Classes` (`ClassID`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	mysqli_query($conn, "
	CREATE TABLE IF NOT EXISTS `clanmembers` (
	  `ClanID` int(32) NOT NULL,
	  `UserID` int(32) unsigned NOT NULL,
	  `clanAdmin` int(11) NOT NULL,
	  KEY `ClanID` (`ClanID`),
	  KEY `UserID` (`UserID`),
	  CONSTRAINT `clanmembers` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `clans` FOREIGN KEY (`ClanID`) REFERENCES `clans` (`ClanID`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	mysqli_query($conn, "
	CREATE TABLE `QuestProgress` (
	  `UserID` int(32) unsigned NOT NULL,
	  `QuestID` int(32) unsigned NOT NULL,
	  `QuestProgress` int(3) unsigned NOT NULL,
	  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  KEY `Quests` (`QuestID`),
	  KEY `Quests Progress` (`UserID`),
	  CONSTRAINT `Quests` FOREIGN KEY (`QuestID`) REFERENCES `Quests` (`QuestID`),
	  CONSTRAINT `Quests Progress` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	
	mysqli_query($conn, "
	CREATE TABLE `UserOptions` (
	  `UserID` int(32) unsigned NOT NULL,
	  `ColourScheme` tinyint(1) NOT NULL DEFAULT '0',
	  `TimeZone` text NOT NULL,
	  PRIMARY KEY (`UserID`),
	  CONSTRAINT `User Options` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	
	mysqli_query($conn, "
	CREATE TABLE `XPAwards` (
	  `UserID` int(32) unsigned NOT NULL,
	  `XP` int(11) NOT NULL,
	  `Description` text NOT NULL,
	  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  KEY `XP` (`UserID`),
	  CONSTRAINT `XP` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	") or die('Could not create table: ' .mysqli_error($conn));
	
	$createSuccess = true;

	mysqli_close($conn);

};



?>

	<div class="content">
		<div class="install">
			<h1> Install LeadTheBoard! </h1>
			<?php if(!$createSuccess) { echo '<p> This will configure the database needed for LeadTheBoard! to work. Ensure that the database details in config.php are correct. To continue, click Install </p>'; } ?>
			<?php if($createSuccess) { echo '<p> Achievement Unlocked: LeadTheBoard! successfully installed! <!-- <a href="/">Continue</a> --> <br></p>'; } ?>
			<?php if($sampleSuccess) { echo '<p> Sample demo data inserted <br/ > <a href="/"><div class="button" style="background: rgb(22, 142, 185); color: white;"> Complete </div></a></p>'; } ?>
			<?php if(!$createSuccess) { echo '<a href="installer.php?create=true"><div class="button" style="background: rgb(22, 142, 185); color: white;"> Install </div></a>'; } ?>
		</div>
	</div>

</div>
</body>
</HTML>








