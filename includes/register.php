<?php 

require_once('../config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);



$UIDr = time() . rand(100,1000000);
$firstname = $_POST['firstname'];
$lastname = $_POST['surname'];
$email = $_POST['email'];
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check email is matching 
if($email != $_POST['confirm']) {
	$url = SITE_URL . '/account/register.php?error=1'; 
	header( "Location: $url" );
} else {

	// Check password is secure 
if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,255}$/', $_POST['password'])) {
	$url = SITE_URL . '/account/register.php?error=2'; 
	header( "Location: $url" );
	} else {
		// Check if email is already registered 
		$checkEmail = "SELECT * FROM Users WHERE Email='$email'";
		$emq = mysqli_query($conn, $checkEmail) or die(mysqli_error($conn));
		$userRowCount = $emq->num_rows;
		
		if ($userRowCount != 0) {
				$url = SITE_URL . '/account/register.php?error=3'; 
				header( "Location: $url" );
		} 
		else {

			$regi = $conn->prepare("INSERT INTO Users (UserID, Name, Surname, Email, Password) VALUES (?, ?, ?, ?, ?)");
			$regi->bind_param("issss", $UIDr, $firstname, $lastname, $email, $hash);

			$regi->execute();
						
			$regi->close();


		};
	};
};
$conn->close();
$url = SITE_URL .'/account/setup.php' ; 
header( "Location: $url" );
