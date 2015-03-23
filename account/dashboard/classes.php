<?php session_start();
$isOverview = 0;
require_once("../../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 

if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} else {

include_once(INCLUDES_PATH . "/classes.php");
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create the connection

?>

	<div class="content">
        <h1> Dashboard </h1>
		<?php require_once(TEMPLATES_PATH . "/dashboardNav.php"); ?>
		<table class="dashboardTable ">
			<thead>
				<tr class="headerDash">
					<th class="hClass">Class</th>
					<th class="hAch"><span class="flaticon-trophy56 boardIcon"></span></th>
					<th class="hQuests"><span class="flaticon-pencil43 boardIcon"></span></th>
					<th class="hStudents"><span class="flaticon-user182 boardIcon"></span></th>
					<th class="hActions"> Actions </th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($classes as $class) {
				$classID = $class['ClassID'];
				$sql = "SELECT ClassID, Count(*) AS 'Members' FROM ClassMembers WHERE ClassID='$classID' GROUP BY ClassID";
				$query = mysqli_query($conn, $sql) or die(mysqli_error());
				$classes = array();
				$studentCount = $query->num_rows;
				while($row = mysqli_fetch_assoc($query)) {
				   $classes[] = $row;
				}

				$sql = "SELECT ClassMembers.UserID, AchievementProgress.UserID,  AchievementProgress.AchievementProgress FROM `AchievementProgress` INNER JOIN `ClassMembers` on AchievementProgress.UserID = ClassMembers.UserID WHERE AchievementProgress.AchievementProgress='1' AND ClassMembers.ClassID='$classID';";
				$query = mysqli_query($conn, $sql) or die(mysqli_error());
				$AchievementsCompleteRowCount = $query->num_rows;

				$sql = "SELECT ClassMembers.UserID, QuestProgress.UserID,  QuestProgress.QuestProgress FROM `QuestProgress` INNER JOIN `ClassMembers` on QuestProgress.UserID = ClassMembers.UserID WHERE QuestProgress.QuestProgress='1' AND ClassMembers.ClassID='$classID';";
				$query = mysqli_query($conn, $sql) or die(mysqli_error());
				$QuestsCompleteRowCount = $query->num_rows;

			?>

					<tr>
						<td class="tClass"><a href="edit/class.php?class=<?php echo $class['ClassID'];?>"> <?php echo $class['Name']; ?> </a></td>
						<td class="tAch"> <?php echo $AchievementsCompleteRowCount; ?> </td>
						<td class="tQuests"> <?php echo $QuestsCompleteRowCount; ?> </td>
						<td class="tStudents"> <?php if($studentCount == 0) { echo 0; } else { echo $classes[0]['Members']; } ?> </td>
						<td class="tActions"> <a href="edit/class.php?class=<?php echo $class['ClassID'];?>"><span title="Edit" class="flaticon-cogwheel25 action"></span></a> <a href=""><span title="Delete" class="flaticon-delete84 action"></span></a> </td>
					</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			</tfoot>		
		</table>

	</div>

<?php 
mysqli_close($conn); // Close the connection 
}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


