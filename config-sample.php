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

//Site URL
$siteURL = 'http://localhost';

// Consistent paths
require_once('consistentPaths.php');
?>
