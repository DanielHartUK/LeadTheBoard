<?php 

if($_GET['step'] == 1) {
$servername = $_POST["dbHost"] ;  // URL of MySQL database, localhost will usually be fine
$username = $_POST["dbUser"] ; // MySQL username
$password = $_POST["dbPass"] ; // User password
$dbname = $_POST["dbName"] ; // Database 

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	$url = '/installerDev.php?error='. mysqli_connect_error(); 
	header( "Location: $url" );

} else {

$dbCred = '
<?php

// Development only
ini_set("display_errors", 1); 
error_reporting(E_ALL);	


// This is an example of the config file. 
// Change the MySQL details and site url to use.

// MySQL Login
$servername = "' . $_POST["dbHost"] . '";  // URL of MySQL database, localhost will usually be fine
$username = "' . $_POST["dbUser"] . '"; // MySQL username
$password = "' . $_POST["dbPass"] . '"; // User password
$dbname = "' . $_POST["dbName"] . '"; // Database 

//Site URL
$siteURL = "http://localhost:8888";

//Support Email
$supportEmail = "me@kingdingdan.com";

// Consistent paths
require_once("consistentPaths.php");
?>';

$configWrite = fopen("../config.php", "w");

fwrite($configWrite, $dbCred);

fclose($configWrite);




$url = '/installerDev.php?step=2'; 
header( "Location: $url" );
}

} 
