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
					<th>Class</th>
					<th><div class="flaticon-trophy56 boardIcon"></div></th>
					<th><div class="flaticon-pencil43 boardIcon"></div></th>
					<th>Students</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td> Class A </td>
					<td> 14 </td>
					<td> 12 </td>
					<td> 30 </td>
					<td> <span class="flaticon-settings21 action"></span> <span class="flaticon-delete84 action"></span> </td>

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


