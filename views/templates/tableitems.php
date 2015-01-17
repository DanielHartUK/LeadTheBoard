

	<?php 
	// Displaying the available quests
		$ai = 0; 
		while($ai < $leaderboardCount) { ?>
		<?php $idOfUser = $ai; ?>
			<tr class="boardEntry">
				<td class="pos" data-th="Position">
					<?php
					$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
					$a = "SELECT * FROM AchievementProgress WHERE UserID='$idOfUser' AND AchievementProgress='1'";
					$b =  mysqli_query($conn, $a) or die(mysqli_error());
					$c = $b->num_rows;
					$d = array();
					while($row = mysqli_fetch_assoc($b)) {
					   $d[] = $row;
					}
					mysqli_close($conn); // Close the connection 
					echo $d[0]['Position'];
					?>
				</td>
				<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src="../assets/uploads/<?php echo $leaderboarda[$ai]['Avatar']; ?>"></td>
				<td data-th="Student Name"><?php echo $leaderboarda[$ai]['Name'] . " " . $leaderboarda[$ai]['Surname'];  ?></td>
				<td data-th="Achievements">
					<?php
					$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
					$a = "SELECT * FROM AchievementProgress WHERE UserID='$idOfUser' AND AchievementProgress='1'";
					$b =  mysqli_query($conn, $a) or die(mysqli_error());
					$c = $b->num_rows;
					mysqli_close($conn); // Close the connection 
					echo $c;
					?>
				</td>
				<td data-th="Quests">
					<?php
					$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
					$a = "SELECT * FROM QuestProgress WHERE UserID='$idOfUser' AND QuestProgress='1'";
					$b =  mysqli_query($conn, $a) or die(mysqli_error());
					$c = $b->num_rows;
					mysqli_close($conn); // Close the connection 
					echo $c;
					?>	
				</td>
				<td data-th="XP">
					<?php
					$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
					$a = "SELECT * FROM Users WHERE UserID='$idOfUser'";
					$b =  mysqli_query($conn, $a) or die(mysqli_error());
					$c = $b->num_rows;
					$d = array();
					while($row = mysqli_fetch_assoc($b)) {
					   $d[] = $row;
					}
					mysqli_close($conn); // Close the connection 
					echo $d[0]['XP'];
					?>
				</td>
			</tr>
    		<?php $ai++;
		} 
	?>


