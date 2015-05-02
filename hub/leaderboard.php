<?php 
$isLeaderboard = 1;
$pageTitle = 'Leaderboard';
require_once("config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 

$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
$a = "SELECT Users.Name, Users.Surname, Users.Avatar, Users.Admin, UserStats.*       
FROM `Users`
INNER JOIN `UserStats` on Users.UserID = UserStats.UserID WHERE UserStats.ClassID = '$selectedClass'";
$b =  mysqli_query($conn, $a) or die(mysqli_error($conn));
$usersLCount = $b->num_rows;
$d = array();
while($row = mysqli_fetch_assoc($b)) {
   $d[] = $row;
}
mysqli_close($conn); // Close the connection 

?>
	<div class="leaderboard">
	<?php if($usersLCount == 0) {
    	echo "<a href='".SITE_URL."/account/dashboard/edit/class.php?class=".$selectedClass."'><div class='warningBanner blue'> No students are in this class yet. Click to add some.</div></a>";
	} else { ?>
	<table class="mainBoard ">
		<thead>
			<tr class="headerBoard">
				<th id="headPos">#</th>
				<th id="headPro" style="text-align: center;"><div class="flaticon-user182 boardIcon" style="width: 100%;"></div></th>
				<th id="headName">Student Name</th>
				<th id="headAch"><div class="flaticon-trophy56 boardIcon"></div><span class="headLabel"> Achievements </span> </th>
				<th id="headQuests"><div class="flaticon-pencil43 boardIcon"></div><span class="headLabel"> Quests </span> </th>
				<th id="headXP"><div class="flaticon-medal61 boardIcon"></div><span class="headLabel"> XP </span> </th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$ai = 0; 
				while($ai < $usersLCount) { ?>
				<?php $idOfUser = $d[$ai]['UserID']; ?>

					<tr class="boardEntry <?php if ($idOfUser == $id ) { echo 'userBoard'; } ?>">
						<td class="pos" data-th="Position"><?php echo $d[$ai]['Position']; ?></td>
						<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src="../assets/uploads/<?php echo $d[$ai]['Avatar']; ?>"></td>
						<td class="StudentName" data-th="Student Name"><a href="/profile.php?user=<?php echo $d[$ai]['UserID']; ?>"> <?php echo $d[$ai]['Name'] . " " . $d[$ai]['Surname'];  ?></a></td>
						<td class="achievements" data-th="Achievements">
							<?php
							$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
							$a = "SELECT * FROM AchievementProgress WHERE UserID='$idOfUser' AND AchievementProgress='1'";
							$b =  mysqli_query($conn, $a) or die(mysqli_error($conn));
							$c = $b->num_rows;
							mysqli_close($conn); // Close the connection 
							echo $c;
							?>
						</td>
						<td class="quests" data-th="Quests">
							<?php
							$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
							$a = "SELECT * FROM QuestProgress WHERE UserID='$idOfUser' AND QuestProgress='1'";
							$b =  mysqli_query($conn, $a) or die(mysqli_error($conn));
							$c = $b->num_rows;
							mysqli_close($conn); // Close the connection 
							echo $c;
							?>	
						</td>
						<td class="xp" data-th="XP">
							<?php echo $d[$ai]['XP']; ?>
						</td>
					</tr>
		    		<?php $ai++;
				} 
			?>
		</tbody>
		<tfoot>
		</tfoot>		
	</table>
	<?php } ?>

</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
