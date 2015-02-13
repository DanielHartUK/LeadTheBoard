<?php 
$isOverview = 0;
require_once("../../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 

if ($admin == 0) {
	include_once(TEMPLATES_PATH . "/wrongPermissions.php"); 
} else {
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
				<tr>
					<td class="tClass"> Class A </td>
					<td class="tAch"> 14 </td>
					<td class="tQuests"> 12 </td>
					<td class="tStudents"> 30 </td>
					<td class="tActions"> <a href=""><span title="Edit" class="flaticon-cogwheel25 action"></span></a> <a href=""><span title="Delete" class="flaticon-delete84 action"></span></a> </td>
				</tr>
				<tr>
					<td class="tClass"> Class b </td>
					<td class="tAch"> 14 </td>
					<td class="tQuests"> 12 </td>
					<td class="tStudents"> 30 </td>
					<td class="tActions"> <a href=""><span title="Edit" class="flaticon-cogwheel25 action"></span></a> <a href=""><span title="Delete" class="flaticon-delete84 action"></span></a> </td>
				</tr>
				<tr>
					<td class="tClass"> Class c </td>
					<td class="tAch"> 14 </td>
					<td class="tQuests"> 12 </td>
					<td class="tStudents"> 30 </td>
					<td class="tActions"> <a href=""><span title="Edit" class="flaticon-cogwheel25 action"></span></a> <a href=""><span title="Delete" class="flaticon-delete84 action"></span></a> </td>
				</tr>
			</tbody>
			<tfoot>
			</tfoot>		
		</table>

	</div>

<?php 
}; 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>


