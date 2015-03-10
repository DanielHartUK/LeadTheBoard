<?php

$classID = '0';

$loggedIn = 0;
if (isset($_SESSION['loggedIn'])) {
	if($_SESSION['loggedIn'] == 1) {
		$loggedIn = 1;
	} 
} else {
$loggedIn = 0;
}
if (isset($_SESSION['UserID'])) {
	$id = $_SESSION['UserID'];
} 