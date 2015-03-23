<?php 
session_start();
require_once("config.php");
if(isset($_GET['logOut'])) {
	if($_GET['logOut'] == 1) {
		session_destroy();
		Header('Location: '.$_SERVER['PHP_SELF']);
	}
}
include_once(INCLUDES_PATH . "/demoVariables.php"); 



	if($loggedIn == 1) { 
	include(HUB_PATH . "/leaderboard.php");
	} else { 
	$noLogin = 1;
	include(ACCOUNT_PATH . "/login.php");
	}; 

?>







