<?php 
require_once("../config.php");
include_once(INCLUDES_PATH . "/demoVariables.php"); 
include_once(INCLUDES_PATH . "/userSQL.php");
include_once(TEMPLATES_PATH . "/header.php"); 
?>
<div class="loginBack"><a href="/"> &#8592; Back </a></div>
<div class="content loginBk">
	<div class="login">
		<div class="logo"> LeadTheBoard! </div>
		<form style="overflow: auto;">
			<input class="field loginEmail" type="email" placeholder="Email Address">
			<input class="field loginPassword" type="password" placeholder="Password">
			<div class="formSubmit">
				<p class="clickable" onclick="forgotClick()"> Forgot password? </p>
				<input type="submit" class="submit loginSubmit button " value="Login">
			</div>
		</form>
	</div>


</div>

<?php include_once(TEMPLATES_PATH . "/footer.php"); ?>



		