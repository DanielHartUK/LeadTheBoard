

	<?php 
		$conn = mysqli_connect($servername, $username, $password, $dbname); // 	
		$a = "SELECT * FROM Users WHERE Admin='0' ORDER BY Position";
		$b =  mysqli_query($conn, $a) or die(mysqli_error());
		$usersLCount = $b->num_rows;
		$d = array();
		while($row = mysqli_fetch_assoc($b)) {
		   $d[] = $row;
		}
		mysqli_close($conn); // Close the connection 


		$ai = 0; 
		while($ai < $usersLCount) { ?>
		<?php $idOfUser = $d[$ai]['UserID']; ?>

			<tr class="boardEntry">
				<td class="pos" data-th="Position"><?php echo $d[$ai]['Position']; ?></td>
				<td data-th="avatar" class="boardAvatar"><img class="avatarBoard" src="../assets/uploads/<?php echo $d[$ai]['Avatar']; ?>"></td>
				<td class="StudentName" data-th="Student Name"><a href="/views/profile.php?user=<?php echo $d[$ai]['UserID']; ?>"> <?php echo $d[$ai]['Name'] . " " . $d[$ai]['Surname'];  ?></a></td>
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
					<?php echo $d[$ai]['XP']; ?>
				</td>
			</tr>
    		<?php $ai++;
		} 
	?>


