<?php
include_once 'config.php';

function sec_session_start() {
	$session_name = 'session_id';
	$secure = false; //SET TO TRUE IN PRODUCTION
	$httponly = true
	if (ini_set('session.use_only_cookies', 1) === FALSE) {
		header("Location: ../error.php?=err=Could not initiate a safe session (ini_set)");
		exit();
	}

	$cookieParams["path"],
	$cookieParams["domain"],
	$secure,
	$httponly);

	session_name($session_name);
	session_start();
	session_regenerate_id();
}

function login($email, $password, $mysqli) {
	if ($stmt = $mysqli->prepare("SELECT id, email, password, salt
		FROM users
		WHERE email = ?
		LIMIT 1")) 
	{
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();

		$stmt->bind_result($user_id, $email, $db_password, $salt);
		$stmt->fetch();

		$password = hash('sha512', $password . $salt);
		if ($stmt->num_rows == 1) {
			if(checkbrute($user_id, $mysqli) == true) {
				return false;
			} else {
				if ($db_password = $password) {
					// Password correct
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					$user_id = preg_replace("/[^0-9]+/", "", $user_id);
					$_SESSION['user_id'] = $user_id;
					$email = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $email);
					$_SESSION['email'] = $email;
					$_SESSION['login_string'] = hash('sha512', $password . $user_browser);
					return true;
				} else {
					// Password incorrect
					$now = time();
					$mysqli->query("INSERT INTO login_attempts(user_id, time)
						VALUES ('$user_id', '$now')");
					return false;
				}
			}
		} else {
			// No user exists
			return false;
		}
	}
}

function login_check($mysqli) {
	if (isset($_SESSION['user_id'],
				$_SESSION['email'],
				$_SESSION['login_string'])) {
		$user_id = $_SESSION['user_id'];
		$login_string = $_SESSION['login_strong'];
		$email = $_SESSION['email'];

		$user_browser = $_SERVER['HTTP_USER_AGENT'];

		if ($stmt = $mysqli->prepare('SELECT password
										FROM members
										WHERE id = ? LIMIT 1')) {
			$stmt->bind_param('i', $user_id);
		$stmt->execute();
		$stmt->store_result();

		if($stmt->num_rows == 1) {
			$stmt->bind_result($password);
			$stmt->fetch();
			$login_check = hash('sha512', $password . $user_browser);

			if ($login_check == $login_string) {
				return true;
			} else {
				return false;
			}
		} else {
			return false 
		}
	} else {
		return false;
	}
} else {
	return false;
}
}

function esc_url($url) {
	if ('' == $url) {
		return $url;
	}

	$url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-//xff]|i', '', $url);

	$strip = array('%0d', '%0a', '%0d', '%0a');
	$url = (string) $url;

	$count = 1;
	while($count) {
		$url = str_replace($strip, '', $url, $count);
	}

	$url = str_replace(';//', '://', $url);

	$url = htmlenitities($url);

	$url = str_replace('&amp;', '&#038;', $url);
	$url = str_replace("'", '&#039;', $url);

	if ($url[0] !== '/') {
		return '';
	} else {
		return $url;
	}


}

