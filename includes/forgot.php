<?php 
require_once('../config.php');

// This file is to create a token, and send the user a password reset email, reset.php will handle the password reset


$conn = mysqli_connect($servername, $username, $password, $dbname);

$email = $_POST['email'];


// Check if email isn't registered 
$checkEmail = "SELECT * FROM Users WHERE Email='$email'";
$emq = mysqli_query($conn, $checkEmail) or die(mysqli_error($conn));
$userRowCount = $emq->num_rows;

if ($userRowCount == 0) {
		$url = SITE_URL . '/account/forgotPassword.php?error=1'; 
		header( "Location: $url" );
} else {
	$token = bin2hex(mcrypt_create_iv(128, MCRYPT_DEV_RANDOM));

	$sql = "SELECT * FROM Users WHERE Email='$email'";
	$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$queryRowCount = $query->num_rows;
	$login = array();
	while($row = mysqli_fetch_assoc($query)) {
	   $login[] = $row;
	}
	
	$userID = $login[0]['UserID'];

	$forgot = $conn->prepare("INSERT INTO ResetPassword (UserID, Token) VALUES (?, ?)");
	$forgot->bind_param("is", $userID, $token);
	$forgot->execute();
	$forgot->close();

	require_once(INCLUDES_PATH ."/swift/lib/swift_required.php");
	
	$transport = Swift_SmtpTransport::newInstance($emailhost, $emailport, $emailsecurity)
	  ->setUsername($emailuser)
	  ->setPassword($emailpass);
	
	$mailer = Swift_Mailer::newInstance($transport);
	
	$message = Swift_Message::newInstance('LeadTheBoard! password reset')
	  ->setFrom(array('abc@example.com' => 'ABC'))
	  ->setTo(array($email))
	  ->setBody('<a href="'.SITE_URL.'/account/reset.php?token='.$token.'"> Reset </a>');
	
	$result = $mailer->send($message);

};

$conn->close();
$url = SITE_URL .'?passwordreset=1'; 
header( "Location: $url" );
