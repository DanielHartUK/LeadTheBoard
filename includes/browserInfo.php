<?php function browserDetails() {

	// Get the user agent of the browser
	$userAgent = $_SERVER['HTTP_USER_AGENT'];

	// Look for specific strings in the UA to identify the browser
	if (preg_match('/OPR/i', $userAgent) or preg_match('/Opera/i', $userAgent))  { 
 		$name = 'Opera';
 		$creator = 'Opera';
	}
	elseif (preg_match('/Chrome/i', $userAgent)) {
		$name = 'Chrome';
		$creator = 'Google';
	}
	elseif (preg_match('/Safari/i', $userAgent)) {
		$name = 'Safari';
		$creator = 'Apple';
	}
	elseif (preg_match('/MSIE/i', $userAgent)) {
		$name = 'Internet Explorer';
		$creator = 'Microsoft';
	}
	elseif (preg_match('/firefox/i', $userAgent)) {
		$name = 'Firefox';
		$creator = 'Mozilla';
	}

	// Put the browser info into an array
	return array(
		'UA' => $userAgent,
		'Browser' => $name,
		'From' => $creator
	);

}

$browser=browserDetails();

?>