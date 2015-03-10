<?php 


$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_SERVER['HTTP_REFERER'])) {
	$incoming = $_SERVER['HTTP_REFERER'];
} else {
	$incoming = 'Direct';
}
$page = $_SERVER['REQUEST_URI'];

if (!strpos($page, 'analytics')) {
$analytics = $conn->prepare("INSERT INTO Analytics (IP, Incoming, Page) VALUES (?, ?, ?)");
$analytics->bind_param("sss", $ip, $incoming, $page);
$analytics->execute();		
$analytics->close();
}

mysqli_close($conn); // Close the connection 




