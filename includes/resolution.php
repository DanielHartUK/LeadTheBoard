<?php function browserDetails() {
	$userAgent = $_SERVER['HTTP_USER_AGENT'];

	// Find what the name of the browser is, in this order because the WebKit/Blink UA is anonoying in the way in which Opera has Chrome and Safari in it's UA too, and Chrome has Chrome and Safari in it's UA.
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

	return array(
		'UA' => $userAgent,
		'Browser' => $name,
		'From' => $creator
	);

}

$browser=browserDetails();

?>