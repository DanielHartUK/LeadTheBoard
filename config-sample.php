<?php

// Development only
ini_set('display_errors', 1); 
error_reporting(E_ALL);	


// This is an example of the config file. 
// Change the MySQL details and site url to use.

// MySQL Login
$servername = "localhost";  // URL of MySQL database, localhost will usually be fine
$username = "test"; // MySQL username
$password = "test"; // User password
$dbname = "test"; // Database 

// Mail settings

$emailhost = 'smtp.gmail.com';
$emailport = '465';
$emailsecurity = 'ssl';
$emailuser = '@gmail.com';
$emailpass = ''; // Use app password if 2 step auth enabled

//Site URL
$siteURL = 'http://localhost';

//Support Email
$supportEmail = 'example@example.com';

// Enable Analytics? (Experimental)
$analyticsEnabled = 0;

// Consistent paths
require_once('consistentPaths.php');
?>
