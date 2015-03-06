<?php 
session_start();

require_once('../config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);



if(isset($_POST['email'])) {
	$email = $_POST['email'];

	$checkLogin = "SELECT * FROM Users WHERE Email='$email'";
	$emq = mysqli_query($conn, $checkLogin) or die(mysqli_error());
	$userRowCount = $emq->num_rows;
	$login = array();
	while($row = mysqli_fetch_assoc($emq)) {
	   $login[] = $row;
	}

if ($userRowCount == 0) {
	$url = SITE_URL . '/account/login.php?error=1'; 
	header( "Location: $url" );
} 
else {
	if (password_verify($_POST['password'], $login[0]['Password']) ) {
		$_SESSION['UserID'] =  $login[0]['UserID'];
		$_SESSION['loggedIn'] =  1;
	} else {
		$url = SITE_URL . '/account/login.php?error=2'; 
		header( "Location: $url" );
		session_unset(); 
		session_destroy();
	}
}
$url = SITE_URL ; 
header( "Location: $url" );


}
