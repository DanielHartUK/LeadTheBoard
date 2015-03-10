<?php session_start();
$isOverview = 0;
require_once("../../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 

if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} else {

include_once(INCLUDES_PATH . "/classes.php");

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
			<?php foreach ($classes as $class) {?>
					<tr>
						<td class="tClass"> <?php echo $class['Name']; ?> </td>
						<td class="tAch"> <?php echo $class['Name']; ?> </td>
						<td class="tQuests"> <?php echo $class['Name']; ?> </td>
						<td class="tStudents"> <?php echo $classMembers[$class['ClassID']]['UserID']; ?> </td>
						<td class="tActions"> <a href="edit/class.php?class=<?php echo $class['ClassID'];?>"><span title="Edit" class="flaticon-cogwheel25 action"></span></a> <a href=""><span title="Delete" class="flaticon-delete84 action"></span></a> </td>
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


