<?php session_start();
$isOverview = 0;
require_once("../../config.php");
if (isset($_GET['clear'])) {
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "DELETE FROM LoginAttempts";
	$query = mysqli_query($conn, $sql) or die(mysqli_error());
	mysqli_close($conn); 
	Header('Location: '.$_SERVER['PHP_SELF']);
}
include_once(TEMPLATES_PATH . "/header.php"); 
if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} else {
include_once(INCLUDES_PATH . "/logs.php");

?>

	<div class="content">
        <h1> Dashboard </h1>
		<?php require_once(TEMPLATES_PATH . "/dashboardNav.php"); ?>
		<a href="?clear=1"><div class="button blue clearLogs"><span title="Delete" class="flaticon-delete84 action"></span> Clear All </div></a>
		<table class="dashboardTable ">
			<thead>
				<tr class="headerDash">
					<th class="">Email</th>
					<th class="">IP</th>
					<th class="">Error</th>
					<th class="">Time</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($logs as $log) {?>
					<tr>
						<td class=""> <?php echo $log['Email']; ?> </td>
						<td class=""> <?php echo $log['IP']; ?> </td>
						<td class=""> <?php if ($log['Type'] == 1) { echo 'Incorrect/unregistered email'; } elseif($log['Type'] == 2) { echo 'Incorrect password'; } ?> </td>
						<td class=""> <?php echo $log['Timestamp']; ?> </td>
					</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			</tfoot>		
		</table>
	</div>

<?php 
}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


