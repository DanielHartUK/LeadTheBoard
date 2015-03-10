<?php 

require_once('../config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);




// Check password is matching 
if($_POST['password'] != $_POST['confirm']) {
	$url = SITE_URL . '/account/reset.php?error=1'; 
	header( "Location: $url" );
} else {
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
	// Check password is secure 
if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,255}$/', $_POST['password'])) {
	$url = SITE_URL . '/account/reset.php?error=2'; 
	header( "Location: $url" );
	} else {
			$token = $_GET['token'];
			$sql = "SELECT * FROM ResetPassword WHERE Token='$token'";
			$query = mysqli_query($conn, $sql) or die(mysqli_error());
			$queryRowCount = $query->num_rows;
			$getUID = array();
			while($row = mysqli_fetch_assoc($query)) {
			   $getUID[] = $row;
			}

			$id = $getUID[0]['UserID'];
			$reset = $conn->prepare("UPDATE Users SET Password=? WHERE UserID=$id");
			$reset->bind_param("s", $hash);

			$reset->execute();
						
			$reset->close();

			$sql = "DELETE FROM ResetPassword WHERE Token='$token'";
			$query = mysqli_query($conn, $sql) or die(mysqli_error());



	};
};
$conn->close();
$url = SITE_URL ; 
header( "Location: $url" );
