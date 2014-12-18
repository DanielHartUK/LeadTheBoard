<?php
include_once 'db_connect.php';
include_once 'psl_config.php';

$error_msg = "";

if(isset($_POST['email'], $_POST['p'])) {
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		//Not a valid email
		$error_msg .= '<script> alert("yay"); </script>' ; // Change me
	}

	$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
	if (strlen($password) != 128) {
		//The hashed pwd should be 128 char long
		$error_msg .= '<p class="error"> Oh dear </p>'; // Change me
	}

	// Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.

	$prep_stmt = "SELECT id FROM users WHERE email = ? LIMIT 1";
	$stmt = $mysqli->prepare($prep_stmt);

	// Check existing email

	if ($stmt) {
		$stmt-> bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();

		if($stmt->num_rows == 1) {
			// Email already exists
			$error_msg .= '<script> alert("exists"); </script>' ; // Change me
			$stmt->close();
		}
		$stmt->close();
	} else {
		$error_msg .= '<script> alert("DB error"); </script>' ; // Change me
		$stmt->close();
	}

	if (empty($error_msg)) {
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

		$password = hash('sha512', $password . $random_salt);

		// Insert new user into DB
		if ($insert_stmt = $mysqli->prepare("INSERT INTO users (email, password, salt) VALUES (?, ?, ?)")) {
			$insert_stmt->bind_param('ssss', $email, $password, $random_salt);

			if(! $insert_stmt->  execute()) {
				header('Location: ../error.php?err=Registration Failure: INSERT');
			}
		}
		header('Location: ./register_sucess.php')
	}

}