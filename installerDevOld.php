<?php 
require_once("config.php");

$createSuccess = false;
$sampleSuccess = false;
$step = '1';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
	

if(isset($_GET['step'])) {
	if ($_GET['step'] == 2) {

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
		CREATE TABLE `Classes` (
		  `ClassID` int(32) unsigned NOT NULL,
		  `Name` text NOT NULL,
		   `AdminID` int(32) unsigned NOT NULL,
		  PRIMARY KEY (`ClassID`)
		  KEY `Class Admin` (`AdminID`),
		  CONSTRAINT `Class Admin` FOREIGN KEY (`AdminID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
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
		  CONSTRAINT `XP` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
		)ENGINE=InnoDB DEFAULT CHARSET=latin1;
		") or die('Could not create table: ' .mysqli_error($conn));
		
		mysqli_query($conn, "
		SET foreign_key_checks = 1;
		") or die('Could not create table: ' .mysqli_error($conn));

		$createSuccess = true;

		mysqli_query($conn, "
		INSERT INTO `Achievements` (`AchievementID`, `Name`, `Description`, `XPValue`, `Icon`)
		VALUES
			(0,'Oh it\'s on!','Join LeadTheBoard!',1,'goat.jpg'),
			(1,'Hello World','Print \'Hello World\'',10,'goat.jpg'),
			(2,'Punctual!','Submit an assignment on time',30,'goat.jpg');
		") or die('Could not create table: ' .mysqli_error($conn));
		
		mysqli_query($conn, "
		INSERT INTO `Classes` (`ClassID`, `Name`)
		VALUES
			(0,'Class A'),
			(1,'Class B');
		") or die('Could not create table: ' .mysqli_error($conn));

		mysqli_query($conn, "
		INSERT INTO `clans` (`ClanID`, `Name`, `Emblem`) VALUES
			(1, 'Goat Hunters!', 'goat.jpg'),
			(2, 'Goat Busters!', 'goat.jpg'),
			(3, 'LaserPunchers!', 'goat.jpg'),
			(5, 'nnn', 'goat.jpg');
		") or die('Could not create table: ' .mysqli_error($conn));

		mysqli_query($conn, "
		INSERT INTO `Quests` (`QuestID`, `Name`, `Description`, `XPValue`, `Icon`, `Expire`)
		VALUES
			(0,'Quest 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer consequat euismod lectus a rutrum. Sed ornare libero vel vestibulum finibus. Ut nisi tortor, aliquet sed dapibus quis, ultricies id est. Mauris consequat pulvinar sapien ac elementum. Fusce elementum arcu at gravida eleifend. Nunc vitae lacus diam. Nullam nec mauris ut leo molestie maximus. Fusce mauris nisi, viverra nec aliquet a, cursus non augue. Suspendisse potenti. Sed ac mauris venenatis, placerat quam ut, finibus velit. Proin ultrices lectus posuere, accumsan justo ut, porttitor nulla. Aenean bibendum nisi at orci aliquam, nec congue purus sagittis.',150,'goat.png','2015-02-19 13:35:40'),
			(1,'Quest 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer consequat euismod lectus a rutrum. Sed ornare libero vel vestibulum finibus. Ut nisi tortor, aliquet sed dapibus quis, ultricies id est. Mauris consequat pulvinar sapien ac elementum. Fusce elementum arcu at gravida eleifend.z D',5,'goat.png','2015-01-19 16:26:27'),
			(2,'Quest 3','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer consequat euismod lectus a rutrum. Sed ornare libero vel vestibulum finibus. Ut nisi tortor, aliquet sed dapibus quis, ultricies id est. Mauris consequat pulvinar sapien ac elementum. Fusce elementum arcu at gravida eleifend.X D',5,'goat.png','2015-03-19 16:26:29'),
			(3,'Quest 4','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer consequat euismod lectus a rutrum. Sed ornare libero vel vestibulum finibus. Ut nisi tortor, aliquet sed dapibus quis, ultricies id est. Mauris consequat pulvinar sapien ac elementum. Fusce elementum arcu at gravida eleifend.',10,'goat.png','2015-01-20 16:26:42'),
			(4,'Quest 5','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer consequat euismod lectus a rutrum. Sed ornare libero vel vestibulum finibus. Ut nisi tortor, aliquet sed dapibus quis, ultricies id est. Mauris consequat pulvinar sapien ac elementum. Fusce elementum arcu at gravida eleifend.b d',20,'goat.png','2015-01-19 05:26:44');
		
		") or die('Could not create table: ' .mysqli_error($conn));
		
		mysqli_query($conn, "
		INSERT INTO `Users` (`UserID`, `Name`, `Surname`, `Email`, `Avatar`, `Admin`, `XP`, `Position`, `Password`, `Salt`)
		VALUES
			(1421710773,'Lorem','Ipsum Jr.','x','goat.jpg',0,121,2,NULL,NULL),
			(1421710893,'John','Smith','A','goat.jpg',0,150,1,NULL,NULL);
		
		") or die('Could not create table: ' .mysqli_error($conn));
		
		mysqli_query($conn, "
		INSERT INTO `AchievementProgress` (`UserID`, `AchievementID`, `AchievementProgress`, `Timestamp`)
		VALUES
			(1421710773,0,1,'2015-01-19 23:48:36'),
			(1421710893,0,0,'2015-01-19 23:49:47'),
			(1421710773,1,1,'2015-01-19 23:48:36'),
			(1421710773,2,0,'2015-01-19 23:48:36');
		") or die('Could not create table: ' .mysqli_error($conn));
		
		mysqli_query($conn, "
		INSERT INTO `ClassMembers` (`UserID`, `ClassID`)
		VALUES
			(1421710773,0),
			(1421710893,0);
		") or die('Could not create table: ' .mysqli_error($conn));

		mysqli_query($conn, "
		INSERT INTO `clanmembers` (`ClanID`, `UserID`, `clanAdmin`) VALUES
		(2, 1421710773, 0);
		") or die('Could not create table: ' .mysqli_error($conn));
		
		mysqli_query($conn, "
		INSERT INTO `QuestProgress` (`UserID`, `QuestID`, `QuestProgress`, `Timestamp`)
		VALUES
			(1421710773,0,0,'2015-01-19 23:45:50'),
			(1421710893,0,1,'2015-01-19 23:49:47'),
			(1421710773,1,0,'2015-01-19 23:45:50'),
			(1421710773,2,0,'2015-01-19 23:45:50'),
			(1421710773,3,0,'2015-01-19 23:45:50'),
			(1421710773,4,0,'2015-01-19 23:45:50');
		") or die('Could not create table: ' .mysqli_error($conn));
		
		mysqli_query($conn, "
		INSERT INTO `UserOptions` (`UserID`, `ColourScheme`, `TimeZone`)
		VALUES
			(1421710773,0,'Europe/London'),
			(1421710893,1,'Europe/London');
		") or die('Could not create table: ' .mysqli_error($conn));
		
		mysqli_query($conn, "
		INSERT INTO `XPAwards` (`UserID`, `XP`, `Description`, `Timestamp`)
		VALUES
			(1421710773,100,'Lorem','2015-01-24 01:23:55'),
			(1421710773,10,'Ipsum','2015-01-24 01:24:00');
		") or die('Could not create table: ' .mysqli_error($conn));

		$sampleSuccess = true;
	};
		mysqli_close($conn);
} // End if isset
	require_once(TEMPLATES_PATH . "/headerSetup.php");

?>

	<div class="content">
		<div class="install">
			<h1> Install </h1>
			<?php require_once(TEMPLATES_PATH . "/setupNav.php"); ?>

			<?php if(!isset($_GET['step'])) { ?>
				<?php if(isset($_GET['error'])) { 
					echo '<div class="warningBanner red"> Error: ' . $_GET['error'] . '<br /> Please check your credentials</div>'; 
				} else { ?>
				<p> Welcome to LeadTheBoard! To get started we first need to set up your database. <br/>
				You'll need a MySQL database and you'll need to know the credentials to it to continue. If you don't have these then try contacting your webhost.
				</p>
				<?php } ?>
				<form class="required" action="<?php echo $siteURL . '/includes/setup.php?step=1'; ?>" method="POST">
					<p class="detailLabel">Database host</p>
      				<input required type="text" name="dbHost" value="<?php echo $servername; ?>" class="inputField">
					<p class="detailLabel">Database username</p>
      				<input required type="text" name="dbUser" value="<?php echo $username; ?>" class="inputField">
					<p class="detailLabel">Database password</p>
      				<input required type="password" name="dbPass" value="<?php echo $password; ?>" class="inputField">
					<p class="detailLabel">Database name</p>
      				<input required type="text" name="dbName" value="<?php echo $dbname; ?>" class="inputField">
      				<input required type="submit" class="button blue" name="dbCred" value="Next">
      			</form>
			<?php } ?>
			<?php if(isset($_GET['step'])) {
				if($_GET['step'] == 2) { ?>
					<p> Excellent! Now we need to set up the admin account (that's you).
					</p>
					<form id="userSetup" action="<?php echo $siteURL . '/includes/setup.php?step=2'; ?>" method="POST">
						<p class="detailLabel">First Name</p>
	      				<input required type="text" name="firstName" value="" class="inputField name">      				
						<p class="detailLabel">Surname</p>
	      				<input required type="text" name="surname" value="" class="inputField name">
						<p class="detailLabel">Email address</p>
	      				<input required type="email" name="email" onblur="IsEmail($('#email').val())" id="email" value="" class="inputField">
						<p class="detailLabel">Password</p>
	      				<input required type="password" name="password" value="" class="inputField" id="password">
						<p class="detailLabel">Confirm Password</p>
	      				<input required type="password" name="confirm" value="" id="confirmPass" class="inputField validate">
	      				<input type="submit" class="button red" id="submit" name="dbCred" disabled="disabled" value="Next"> <span id="formerror"> </span>
	      			</form>
	      		<?php } ?>




			<?php } ?>




			<?php if($createSuccess) { echo '<p> Achievement Unlocked: LeadTheBoard! successfully installed! <!-- <a href="/">Continue</a> --> <br></p>'; } ?>
			<?php if($sampleSuccess) { echo '<p> Sample demo data inserted <br/ > <a href="/"><div class="button" style="background: rgb(22, 142, 185); color: white;"> Complete </div></a></p>'; } ?>
		





		</div>
	</div>

<?php
	require_once(TEMPLATES_PATH . "/footerSetup.php");
?>

