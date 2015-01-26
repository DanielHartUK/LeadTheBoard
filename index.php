<?php 
require_once("config.php");
include_once(INCLUDES_PATH . "/demoVariables.php"); 
include_once(INCLUDES_PATH . "/userSQL.php"); 

	if($loggedIn == 1) { 
	include(VIEWS_PATH . "/leaderboard.php");
	} else { 
	include(VIEWS_PATH . "/intro.php");
	}; 

?>







