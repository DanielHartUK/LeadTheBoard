<?php session_start();
$isOverview = 0;
require_once("../../config.php");
if (isset($_GET['clear'])) {
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "DELETE FROM Analytics";
	$query = mysqli_query($conn, $sql) or die(mysqli_error());
	mysqli_close($conn); 
	Header('Location: '.$_SERVER['PHP_SELF']);
}
include_once(TEMPLATES_PATH . "/header.php"); 
if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} else {
include_once(INCLUDES_PATH . "/analytics.php");
?>

	<div class="content">
        <h1> Dashboard </h1>
		<?php require_once(TEMPLATES_PATH . "/dashboardNav.php"); ?>
		<?php if($analyticsEnabled == 1) { ?>
			<div class="logStat"> <?php echo $analyticsCount; ?> Entries </div>
			<a href="?clear=1"><div class="button blue clearLogs"><span title="Delete" class="flaticon-delete84 action"></span> Clear All </div></a>
			<table class="dashboardTable logs">
				<thead>
					<tr class="headerDash">
						<th class="">IP</th>
						<th class="">Incoming</th>
						<th class="">Page</th>
						<th class="">Time</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($analytics as $entry) {?>
						<tr>
							<td class=""> <?php echo $entry['IP']; ?> </td>
							<td class=""> <?php echo $entry['Incoming']; ?> </td>
							<td class=""> <?php echo $entry['Page'];?> </td>
							<td class=""> <?php echo $entry['Time']; ?> </td>
						</tr>
				<?php } ?>
				</tbody>
				<tfoot>
				</tfoot>		
			</table>
		<?php } else {
            echo "<div class='warningBanner blue'> Analytics aren't enabled right now. </div>";
		} ?>
	</div>

<?php 
}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


