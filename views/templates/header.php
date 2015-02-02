<?php 
include_once(INCLUDES_PATH . "/demoVariables.php"); 
include_once(INCLUDES_PATH . "/refreshsql.php"); 
include_once(INCLUDES_PATH . "/userSQL.php"); 
include_once(INCLUDES_PATH . "/customisation.php"); 
function pageURLContains($x) {
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if (false !== strpos($url, $x)) { return true; };
}
$IGNORETHISFORNOWloggedIn = 0;
?> 
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/normalize.css">
    <script src="../js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <!-- <script src="../js/jquery.floatThead.min.js" type="text/javascript"></script>-->
    <script src="../js/sorttable.js" type="text/javascript"></script>
    <script src="../js/jquery.imageMask.min.js" type="text/javascript"></script>
    <script src="../js/drawer.js" type="text/javascript"></script>
    <script src="/../js/cheet.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../assets/fonts/fonts.css">
    <meta name="viewport" content="initial-scale=1.0">
    <title>LeadTheBoard!</title>
    <meta name="description" content="LeadTheBoard! is a tool designed for education to provide incentives to students in the form of unlockables such as Achievements, Quests and XP.">
    <meta name="keywords" content="LeadTheBoard!, Leaderboard, education, achievements, quests, xp, unlockables">
	<meta name="author" content="The LeadTheBoard! Team">
    <link rel="icon" href="../favicon.png" type="image/png">
</head>
<?php if(pageURLContains($x = 'achievements') OR pageURLContains($x = 'quests')) {
	echo '<body onhashchange="highlightUnlockable()">';
} else {
	echo '<body>';
} ?>
<div class="wrapper <?php if(pageURLContains($x = 'login')) { echo 'loginWrap'; }; ?>">
	<?php if(!pageURLContains($x = 'login')) : ?>
	<div class="nav" <?php if(pageURLContains($x = 'profile') OR pageURLContains($x = 'login')) { echo 'style="background-color: rgba(0, 0, 0, 0.1);"'; } ?> >
		<?php if ($loggedIn) : ?>
			<div class="user" id="loggedIn" onClick="openDrawer()"><img src="<?php echo $profilePic ?>" class="profilePicSmall" alt="<?php echo $firstName. ' ' .$surname; ?> Avatar"> <?php echo $firstName. " " .$surname; ?> <span class="downArrow">&#9654;</span></div>		<?php else : ?>
			<a href="../views/login.php" class="user"><div class="user" id="loggedOut"> Login/Register </div></a>
		<?php endif; ?>
		<div id="logo"><a href="/">LeadTheBoard!</a></div>
		<?php if ($IGNORETHISFORNOWloggedIn) { ?>
			<div class="notificationIcon">
				<?php if ($unreadNotifications == 0) { 
					echo "&nbsp;"; 
				} else { 
					echo $unreadNotifications; 
				}; ?>
			</div>
		<?php } else { ?>
			<div class="notificationIcon loggedOut"></div>
		<?php }; ?>
	</div>
	<div class="contentContainer">
		<?php if ($loggedIn) : ?>
			<?php if ($admin == 0): ?>
				<div class="drawer closed" style="background-color: <?php echo $userColourPrimary[$userColourScheme] ?>;">
					<div class="user" id="loggedIn" onClick="closeDrawer()" style="background-color: <?php echo $userColourSecondary[$userColourScheme] ?>;"><img src="<?php echo $profilePic ?>" class="profilePicSmall" alt="<?php echo $firstName. ' ' .$surname; ?> Avatar"> <?php echo $firstName. " " .$surname; ?> <span class="close">&#215;</span></div>
					<ul class="menu"> <h6> Menu </h6>
	 					<a href="../views/classes.php"><li class="classes"><span class="flaticon-multiple25 sideIcon"></span> Classes </li></a>
						<a href="../views/profile.php?user=<?php echo $id; ?>"><li class="profile"><span class="flaticon-profile8 sideIcon"></span> Profile </li></a>
						<a href="../views/account.php"><li class="Account"><span class="flaticon-settings21 sideIcon"></span> Account </li></a>
						<a href=""><li class="logOut"><span class="flaticon-key162 sideIcon"></span> Log Out </li></a>
					</ul>
				<?php else: ?>
				<div class="drawer" style="background-color: <?php echo $userColourPrimary[$userColourScheme] ?>;">
					<div class="user" id="loggedIn" style="background-color: #16a085;"><img src="<?php echo $profilePic ?>" class="profilePicSmall"> <?php echo $firstName. " " .$surname; ?> </div>
					<ul class="menu"> <h6> <?php echo $class; ?> </h6>
						<a href="../views/profile.php"><li class="profile"><span class="flaticon-trophy56 sideIcon"></span> Achievements </li></a>
						<a href=""><li class="Account"><span class="flaticon-pencil43 sideIcon"></span> Quests </li></a>
					</ul>
					<ul class="menu"> <h6> Admin </h6>
	 					<a href="../views/classes.php"><li class="classes"><span class="flaticon-multiple25 sideIcon"></span> Classes </li></a>
						<a href="../views/account.php"><li class="Account"><span class="flaticon-settings21 sideIcon"></span> Account </li></a>
						<a href=""><li class="logOut"><span class="flaticon-key162 sideIcon"></span> Log Out </li></a>
					</ul>
			<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	