<?php 


if ($analyticsEnabled == 1) {
	$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection
	
	// Get the IP
	$ip = $_SERVER['REMOTE_ADDR'];
	
	// Get the incoming URL
	if (isset($_SERVER['HTTP_REFERER'])) {
		$incoming = $_SERVER['HTTP_REFERER'];
	} else {
		$incoming = 'Direct';
	}
	
	// Get the current page
	$page = $_SERVER['REQUEST_URI'];
	
	// Pop it into the database
	if (!strpos($page, 'analytics')) {
	$analytics = $conn->prepare("INSERT INTO Analytics (IP, Incoming, Page) VALUES (?, ?, ?)");
	$analytics->bind_param("sss", $ip, $incoming, $page);
	$analytics->execute();		
	$analytics->close();
	}
	
	mysqli_close($conn); // Close the connection 
}