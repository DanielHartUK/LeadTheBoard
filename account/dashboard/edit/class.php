<?php session_start();
$isOverview = 0;
$isEdit= 1;

require_once("../../../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 

if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} elseif (isset($_GET['class'])) {
	require_once(INCLUDES_PATH . "/editDash.php");



?>

	<div class="content">
        <h1> Edit Class - <?php echo $classes[0]['Name']; ?></h1>
		<?php require_once(TEMPLATES_PATH . "/dashboardNav.php"); ?>
		<form action="" > 
		    <div class="formContainer">
    			<p class="detailLabel">Class Name</p>
      			<input type="text" name="className" value="<?php echo $classes[0]['Name']; ?>" class="inputField">
      		</div>
			<h4 class="section"> Add/Remove Students  </h4>
			<table class="studentsList">
				<thead>
					<tr>
						<th class="editCheck"> <input type="checkbox" class="inputCheck" disabled="disabled"> </th>
						<th class="editAvatar"> </th>
						<th class="editName"> Student </th>
						<th class="editActions"> Actions </th>
					</tr>	
				</thead>
				<tbody>			
					<?php $i=0; foreach($students as $allStudents) { ?>
						<tr class="editStudent">
							<td class="editCheck"><input type="checkbox" name="someID" class="inputCheck" <?php if (strpos($studentsInClass, $allStudents['UserID']) !== false) { echo "checked"; } ?> ></td>
							<td class="editAvatar"><img src="/assets/uploads/<?php echo $allStudents['Avatar']; ?>"></td>
							<td class="editName"><?php echo $allStudents['Name'] . " " . $allStudents['Surname']; ?></td>
							<td class="editActions"> <a href="student.php?student=<?php echo $allStudents['UserID'];;?>"><span title="Edit" class="flaticon-cogwheel25 action"></span></a> </td>
						</tr>
					<?php $i++; } ?>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
			<div class="boxButton">
            	<input name="" type="submit" class="button blue" id="" value="Save">
            </div>
		</form>

	</div>

<?php 

}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


