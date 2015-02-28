<?php 
$isLeaderboard = 1;
$pageTitle = 'Leaderboard';
require_once("config.php");
require_once(TEMPLATES_PATH . "/mainTop.php"); 

$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
$a = "SELECT * FROM Users WHERE Admin='0' ORDER BY Position";
$b =  mysqli_query($conn, $a) or die(mysqli_error());
$usersLCount = $b->num_rows;
$d = array();
while($row = mysqli_fetch_assoc($b)) {
   $d[] = $row;
}
mysqli_close($conn); // Close the connection 

?>
	<div class="leaderboard">
	<table class="mainBoard ">
		<thead>
			<tr class="headerBoard">
				<th>#</th>
				<th style="text-align: center;"><div class="flaticon-user182 boardIcon" style="width: 100%;"></div></th>
				<th>Student Name</th>
				<th><div class="flaticon-trophy56 boardIcon"></div>Achievements</th>
				<th><div class="flaticon-pencil43 boardIcon"></div>Quests</th>
				<th><div class="flaticon-medal61 boardIcon"></div>XP</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$ai = 0; 
				while($ai < $usersLCount) { ?>
				<?php $idOfUser = $d[$ai]['UserID']; ?>

					<tr class="boardEntry">
						<td class="pos" data-th="Position"><?php echo $d[$ai]['Position']; ?></td>
						<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src="../assets/uploads/<?php echo $d[$ai]['Avatar']; ?>"></td>
						<td class="StudentName" data-th="Student Name"><a href="/profile.php?user=<?php echo $d[$ai]['UserID']; ?>"> <?php echo $d[$ai]['Name'] . " " . $d[$ai]['Surname'];  ?></a></td>
						<td class="achievements" data-th="Achievements">
							<?php
							$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
							$a = "SELECT * FROM AchievementProgress WHERE UserID='$idOfUser' AND AchievementProgress='1'";
							$b =  mysqli_query($conn, $a) or die(mysqli_error());
							$c = $b->num_rows;
							mysqli_close($conn); // Close the connection 
							echo $c;
							?>
						</td>
						<td class="quests" data-th="Quests">
							<?php
							$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
							$a = "SELECT * FROM QuestProgress WHERE UserID='$idOfUser' AND QuestProgress='1'";
							$b =  mysqli_query($conn, $a) or die(mysqli_error());
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


</div>
<?php require_once(TEMPLATES_PATH . "/mainBottom.php"); ?>
