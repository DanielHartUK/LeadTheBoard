<?php 

include_once(INCLUDES_PATH . "/demoVariables.php"); 
if($loggedIn == 0 and !isset($login)) { 
		$url = SITE_URL . '?error=3'; 
		header( "Location: $url" );
 } 
include_once(INCLUDES_PATH . "/refreshsql.php"); 
include_once(INCLUDES_PATH . "/userSQL.php");
include_once(INCLUDES_PATH . "/customisation.php"); 
include_once(INCLUDES_PATH . "/analyticsScript.php"); 
include_once(INCLUDES_PATH . "/project.php"); 
function pageURLContains($x) {
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if (false !== strpos($url, $x)) { return true; };
}
//TO DO : REMOVE IN PRODUCTION!!!!
$IGNORETHISFORNOWloggedIn = 0;

//TO DO : REMOVE IN PRODUCTION!!!!
if(isset($_GET['setAdmin'])) {
	if($_GET['setAdmin']==0) {
		$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection
		$makeAdmin = "UPDATE Users SET Admin='0' WHERE UserID='$id'";
		mysqli_query($conn, $makeAdmin) or die(mysqli_error($conn));
	}
	if($_GET['setAdmin']==1) {
		$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection
		$makeAdmin = "UPDATE Users SET Admin='1' WHERE UserID='$id'";
		mysqli_query($conn, $makeAdmin) or die(mysqli_error($conn));
	}
}


?> 
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/normalize.css">
    <script src="<?php echo SITE_URL; ?>/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo SITE_URL; ?>/js/jquery.floatThead.min.js" type="text/javascript"></script>-->
    <script src="<?php echo SITE_URL; ?>/js/sorttable.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL; ?>/js/jquery.imageMask.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL; ?>/js/drawer.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL; ?>/js/cheet.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/fonts/fonts.css">
    <meta name="viewport" content="initial-scale=1.0">
    <title><?php if(isset($pageTitle)) { echo $pageTitle . " | "; } ?>LeadTheBoard!</title>
    <meta name="description" content="LeadTheBoard! is a tool designed for education to provide incentives to students in the form of unlockables such as Achievements, Quests and XP.">
    <meta name="keywords" content="LeadTheBoard!, Leaderboard, education, achievements, quests, xp, unlockables">
	<meta name="author" content="The LeadTheBoard! Team">
    <link rel="icon" href="<?php echo SITE_URL; ?>/favicon.png" type="image/png">
    <?php if(isset($userColourScheme)) { ?> 
    <style>
    	.sectionNavigation ul li.currentPage {
    		border-color: <?php echo $userColourSecondary[$userColourScheme] ?> ;
    	}
       	.sectionNavigation ul li:hover {
    		border-color: <?php echo $userColourSecondary[$userColourScheme] ?> ;
    	}
    </style>
    <?php } ?>
</head>
<?php if(pageURLContains($x = 'achievements') OR pageURLContains($x = 'quests')) {
	echo '<body onhashchange="highlightUnlockable()" class="preload">';
} else {
	echo '<body class="preload">';
} ?>
<div class="wrapper <?php if(isset($login)) { echo 'loginWrap'; }; ?>">
	<?php if(!isset($login)) : ?>
	<div class="nav"  style="background-color: <?php echo $userColourSecondary[$userColourScheme] ?>;"  >
		<?php if ($loggedIn) : ?>
			<div class="user" <?php if(!pageURLContains($x = 'profile')) { ?>style="background-color: <?php echo $userColourSecondary[$userColourScheme] ?>;" <?php } ?> id="loggedIn" onClick="openDrawer()"><img src="<?php echo $profilePic ?>" class="profilePicSmall" alt="<?php echo $firstName. ' ' .$surname; ?> Avatar"> <?php echo $firstName. " " .$surname; ?> <span class="downArrow">&#9654;</span></div>		<?php else : ?>
			<a href="<?php echo SITE_URL; ?>/account/login.php" class="user"><div class="user" id="loggedOut"> Login/Register </div></a>
		<?php endif; ?>
		<div id="logo"><a href="/">LeadTheBoard!</a></div>
		<?php if(!isset($_COOKIE['cookieWarning'])) { ?>
			<div class="warningBanner cookie"> LeadTheBoard! uses cookies. <a href="<?php echo SITE_URL; ?>/about/cookies.php"> More Info </a> <span class="close cookieBanner">&#215;</span> </div>
		<?php } ?>
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
			<?php // Keep drawer open on account
			if ($admin == 0 AND pageURLContains($x = 'account')) { ?>
				<div class="drawer" style="background-color: <?php echo $userColourPrimary[$userColourScheme] ?>;">
					<div class="user" id="loggedIn" style="background-color: <?php echo $userColourSecondary[$userColourScheme] ?>;"><img src="<?php echo $profilePic ?>" class="profilePicSmall" alt="<?php echo $firstName. ' ' .$surname; ?> Avatar"> <?php echo $firstName. " " .$surname; ?> </div>
					<ul class="menu"> <h6> Menu </h6>
						<a href="<?php echo SITE_URL; ?>/"><li class="Home"><span class="flaticon-home153 sideIcon"></span> Home </li></a>
	 					<a href="<?php echo SITE_URL; ?>/account/classes.php"><li class="classes"><span class="flaticon-multiple25 sideIcon"></span> Classes </li></a>
						<a href="<?php echo SITE_URL; ?>/profile.php?user=<?php echo $id; ?>"><li class="profile"><span class="flaticon-profile8 sideIcon"></span> Profile </li></a>
						<a href="<?php echo SITE_URL; ?>/account/"><li class="Account"><span class="flaticon-settings21 sideIcon"></span> Account </li></a>
						<a href="<?php echo SITE_URL; ?>?logOut=1"><li class="logOut"><span class="flaticon-key162 sideIcon"></span> Log Out </li></a>
					</ul>
			<?php } // Keep drawer open for admins
			elseif ($admin == 0) { ?>
				<div class="drawer closed" style="background-color: <?php echo $userColourPrimary[$userColourScheme] ?>;">
					<div class="user" id="loggedIn" onClick="closeDrawer()" style="background-color: <?php echo $userColourSecondary[$userColourScheme] ?>;"><img src="<?php echo $profilePic ?>" class="profilePicSmall" alt="<?php echo $firstName. ' ' .$surname; ?> Avatar"> <?php echo $firstName. " " .$surname; ?> <span class="close">&#215;</span></div>
					<ul class="menu"> <h6> Menu </h6>
						<a href="<?php echo SITE_URL; ?>/"><li class="Home"><span class="flaticon-home153 sideIcon"></span> Home </li></a>
	 					<a href="<?php echo SITE_URL; ?>/account/classes.php"><li class="classes"><span class="flaticon-multiple25 sideIcon"></span> Classes </li></a>
						<a href="<?php echo SITE_URL; ?>/profile.php?user=<?php echo $id; ?>"><li class="profile"><span class="flaticon-profile8 sideIcon"></span> Profile </li></a>
						<a href="<?php echo SITE_URL; ?>/account/"><li class="Account"><span class="flaticon-settings21 sideIcon"></span> Account </li></a>
						<a href="<?php echo SITE_URL; ?>?logOut=1"><li class="logOut"><span class="flaticon-key162 sideIcon"></span> Log Out </li></a>
					</ul>
			<?php } else { ?>
				<div class="drawer" style="background-color: <?php echo $userColourPrimary[$userColourScheme] ?>;"  >
					<div class="user" id="loggedIn" <?php if (!pageURLContains($x = 'profile')) { ?> style="background-color: <?php echo $userColourSecondary[$userColourScheme] ?>;"<?php  }?>><img src="<?php echo $profilePic ?>" class="profilePicSmall"> <?php echo $firstName. " " .$surname; ?> </div>
					<ul class="menu"> <h6> Admin </h6>
						<a href="<?php echo SITE_URL; ?>/"><li class="Home"><span class="flaticon-home153 sideIcon"></span> Home </li></a>
	 					<a href="<?php echo SITE_URL; ?>/account/dashboard/"><li class="Dashboard"><span class="flaticon-speed13 sideIcon"></span> Dashboard </li></a>
						<a href="<?php echo SITE_URL; ?>/account/"><li class="Account"><span class="flaticon-settings21 sideIcon"></span> Account </li></a>
						<a href="<?php echo SITE_URL; ?>?logOut=1"><li class="logOut"><span class="flaticon-key162 sideIcon"></span> Log Out </li></a>
					</ul>
			<?php } ?>
			    <div class="footer ">
				    <ul class="footerLinks">
				    	<li><div class="flaticon-aries1 gallop"></div> </li>
				    	<a href="<?php echo SITE_URL; ?>/about/"><li>About</li></a>
				    	<a href="<?php echo SITE_URL; ?>/about/support.php"><li>Support</li></a>
				    	<a href="<?php echo SITE_URL; ?>/about/bugs.php"><li>Bugs</li></a>
				    	<br>
				    	<li class="version"><?php echo $version . ' | <span class="status">' . $status . '</span>'; ?></li>
				    	<br>
				    	<li class="copyright">&#169; <script>document.write(new Date().getFullYear())</script> LeadTheBoard! </li>
				    </ul>
			    </div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<div class="drawerMove <?php if(pageURLContains($x = 'account')) { if(isset($login)) { } else { echo 'adminCont'; } } else if (isset($admin)) { if ($admin == 1) { echo 'adminCont'; } } else { } ?>"> 




	