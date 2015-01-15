<?php
require_once("../config.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


$sql = "SELECT * FROM QuestProgress";
$result = mysqli_query($conn, $sql) or die(mysqli_error());

mysqli_close($conn);

	
// Turn the Quests table into arrays
// Use with $quests[ROW NUMBER]['COLUMN NAME'] e.g. $quests[1]['Name'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM Quests";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
$row_cnt = $result->num_rows;

$quests = array();

while($row = mysqli_fetch_assoc($result)) {
   $quests[] = $row;
}

mysqli_close($conn);

// DELETE AT SOME POINT

//$aID=array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
//$aTitle=array("Lorem","ipsum","dolor","sit","amet","consectetur","adipiscing","elit","Duis","sagittis");
//$aDesc=array("Lorem D", "ipsum D", "dolor D", "sit D", "amet D", "consectetur D", "adipiscing D", "elit D", "Duis D", "sagittis D");
//$aValue=array(10, 20, 30, 10, 20, 30, 10, 20, 30, 10);
//$aPic=array("goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg");