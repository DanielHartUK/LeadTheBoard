<?php session_start();

require_once('../config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Upload profile pic 

	// Check if file type is supported
	if($_FILES["file"]["type"] != "image/jpg" && $_FILES["file"]["type"] != "image/png" && $_FILES["file"]["type"] != "image/gif" && $_FILES["file"]["type"] != "image/jpeg" )  {
		$url = SITE_URL . '/account/profileSetup.php?error=1'; 
		header( "Location: $url" );
	} 
	// Check file size
	elseif($_FILES["file"]["size"] > 1048576  )  {
		$url = SITE_URL . '/account/profileSetup.php?error=2'; 
		header( "Location: $url" );
	} else {
		// Get file extension
		$name = $_FILES["file"]["name"];
		$ext = end((explode(".", $name)));
		// Generate new name
		$fileName = rand(1,999999999999999999999) . "." . $ext;
		// If file name already exists
		while(file_exists(UPLOADS_PATH . "/" .$fileName)) {
			$fileName = rand(1,999999999999999999999) . "." . $ext;
		}
		move_uploaded_file($_FILES["file"]["tmp_name"], UPLOADS_PATH . "/" .$fileName);
	}
	$userID = $_SESSION['UserID'];
	// Store profile pic file name in database with user
	$profileSetup1 = $conn->prepare("UPDATE Users SET Avatar=? WHERE UserID = $userID");
	$profileSetup1->bind_param("s", $fileName);
	$profileSetup1->execute();			
	$profileSetup1->close();

// Save colour scheme and timezone in database
	$colourScheme = $_POST['colourOption'];
	$timeZone = 'Europe/London';
	$profileSetup2 = $conn->prepare("INSERT INTO UserOptions (UserID, ColourScheme, TimeZone) VALUES (?, ?, ?)");
	$profileSetup2->bind_param("iss", $userID, $colourScheme, $timeZone);
	$profileSetup2->execute();			
	$profileSetup2->close();

$conn->close();
$url = SITE_URL; 
header( "Location: $url" );
