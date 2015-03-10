<?php session_start();
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
$isAccountIndex = 0;

?>
<?php
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create a connection to the database
if(isset($_POST["submit1"])) {
  $firstName = $_POST['firstName'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $timeZone = $_POST['timeZone'];

  $personalUpdateQuery = "UPDATE `$dbname`.`users` SET `Name`='$firstName',`Surname`='$surname',`Email`='$email' WHERE `users`.`UserID` = '$id'"; 
  mysqli_query($conn, $personalUpdateQuery) or die(mysqli_error());
  mysqli_query($conn, "UPDATE `$dbname`.`useroptions` SET `TimeZone`='$timeZone' WHERE `UserOptions`.`UserID`='$id'") or die(mysqli_error());
  date_default_timezone_set($timeZone);
}
mysqli_close($conn); // Close the connection 
?>
<div class="content">
  <h1> Account </h1>
  <?php include_once(TEMPLATES_PATH . "/accountNav.php"); ?>
  <form name='personalDetails' action='' method=post>
    <TABLE BORDER=2>
      <TR> <TD>First Name</TD> <TD><input type=text name="firstName" value="<?php echo($firstName) ?>"></TD> </TR>
      <TR> <TD>Surname</TD> <TD><input type=text name="surname" value="<?php echo($surname) ?>"></TD> </TR>
      <TR> <TD>Email</TD> <TD><input type=text name="email" value="<?php echo($email) ?>"></TD> </TR>
      <TR> <TD>Timezone</TD> <TD><select name="timeZone"> <option value="<?php echo($timeZone) ?>"><?php echo($timeZone) ?></option><option value="Europe/Amsterdam">Europe/Amsterdam</option><option value="Europe/Andorra">Europe/Andorra</option> <option value="Europe/Athens">Europe/Athens</option> <option value="Europe/Belfast">Europe/Belfast</option> <option value="Europe/Belgrade">Europe/Belgrade</option> <option value="Europe/Berlin">Europe/Berlin</option> <option value="Europe/Bratislava">Europe/Bratislava</option> <option value="Europe/Brussels">Europe/Brussels</option> <option value="Europe/Bucharest">Europe/Bucharest</option> <option value="Europe/Budapest">Europe/Budapest</option> <option value="Europe/Busingen">Europe/Busingen</option> <option value="Europe/Chisinau">Europe/Chisinau</option> <option value="Europe/Copenhagen">Europe/Copenhagen</option> <option value="Europe/Dublin">Europe/Dublin</option> <option value="Europe/Gibraltar">Europe/Gibralta</option> <option value="Europe/Guernsey">Europe/Guernsey</option> <option value="Europe/Helsinki">Europe/Helsinki</option> <option value="Europe/Isle_of_Man">Europe/Isle_of_Man</option> <option value="Europe/Istanbul">Europe/Istanbul</option> <option value="Europe/Jersey">Europe/Jersy</option> <option value="Europe/Kaliningrad">Europe/Kaliningrad</option> <option value="Europe/Kiev">Europe/Kiev</option> <option value="Europe/Lisbon">Europe/Lisbon</option> <option value="Europe/Ljubljana">Europe/Ljubljana</option> <option value="Europe/London">Europe/London</option> <option value="Europe/Luxembourg">Europe/Luxembourg</option> <option value="Europe/Madrid">Europe/Madrid</option> <option value="Europe/Malta">Europe/Malta</option> <option value="Europe/Mariehamn">Europe/Mariehamn</option> <option value="Europe/Minsk">Europe/Minsk</option> <option value="Europe/Monaco">Europe/Monaco</option> <option value="Europe/Moscow">Europe/Moscow</option> <option value="Europe/Nicosia">Europe/Nicosia</option> <option value="Europe/Oslo">Europe/Oslo</option> <option value="Europe/Paris">Europe/Paris</option> <option value="Europe/Podgorica">Europe/Podgorica</option> <option value="Europe/Prague">Europe/Prague</option> <option value="Europe/Riga">Europe/Riga</option> <option value="Europe/Rome">Europe/Rome</option> <option value="Europe/Samara">Europe/Samara</option> <option value="Europe/San_Marino">Europe/San_Marino</option> <option value="Europe/Sarajevo">Europe/Sarajevo</option> <option value="Europe/Simferopol">Europe/Simferopol</option> <option value="Europe/Skopje">Europe/Skopje</option> <option value="Europe/Sofia">Europe/Sofia</option> <option value="Europe/Stockholm">Europe/Stockholm</option> <option value="Europe/Tallinn">Europe/Tallinn</option> <option value="Europe/Tirane">Europe/Tirane</option> <option value="Europe/Tiraspol">Europe/Tiraspol</option> <option value="Europe/Uzhgorod">Europe/Uzhgorod</option> <option value="Europe/Vaduz">Europe/Vaduz</option> <option value="Europe/Vatican">Europe/Vatican</option> <option value="Europe/Vienna">Europe/Vienna</option> <option value="Europe/Vilnius">Europe/Vilnius</option> <option value="Europe/Volgograd">Europe/Volgograd</option> <option value="Europe/Warsaw">Europe/Warsaw</option> <option value="Europe/Zagreb">Europe/Zagreb</option> <option value="Europe/Zaporozhye">Europe/Zaporozhye</option> <option value="Europe/Zurich">Europe/Zurich</option></select> </TD> </TR>
    </TABLE>
    <input name='submit1' type="submit" value="Save Changes">
  </form>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
