<?php 
require_once('../config.php');
$chosenClass = $_POST['classChange'];
setcookie('Class', $chosenClass, time() + (86400 * 3650), "/");
$url = $_SERVER['HTTP_REFERER'];;
header( "Location: $url" );