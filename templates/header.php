<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="UTF-8">
    <script src="jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/fonts/fonts.css">
    <meta name="viewport" content="initial-scale=1.0">
    <title>LeadTheBoard!</title>
    <meta name="description" content="">
    <link rel="icon" href="/favicon.png" type="image/png">
</head>
<body>
<div class="wrapper">
	<div class="nav">
		<div id="logo">LeadTheBoard!</div>
		<div class="user" id="login" onClick="toggleLogin"> Login/Register </div>
		<div class="user" id="loggedIn" style="display:none;"> Hello, Name <span class="downArrow">&#9660;</span></div>
	</div>
	<div class="loginContainers">
		<div class="loginForm">
			<div class="loginDiv">
			<h3> Login to LeadTheBoard! </h3>
			<form style="overflow: auto;">
				<input class="field" type="email" placeholder="Email Address">
				<input class="field" type="password" placeholder="Password">
				<div class="formSubmit">
					<p> Forgot password? </p>
					<input type="submit" class="submit" value="Login">
				</div>
			</form>
			</div>
			<div class="loginDiv formBottom">
				<p>Get a free account</p> <button class="register"> Register </button>
			</div>
		</div>
		<div class="registerForm" style="display:none;">

		</div>
	</div>