<?php
require_once("../config.php");
// Create connection
$conn = mysql_connect($servername, $username, $password);

// Make the JSON file
mysql_select_db($dbname, $conn);
$result = mysql_query("SELECT * from Achievements") or die('Could not query');

$json = array();
if(mysql_num_rows($result)){	
	while($row=mysql_fetch_row($result)){
		$json['Achievements list'][]=$row;
	}
} 


mysql_close($conn);


// Turn the Achievements table into arrays
// Use with $achievements[ROW NUMBER]['COLUMN NAME'] e.g. $achievements[1]['Name'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM Achievements";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
$row_cnt = $result->num_rows;

$achievements = array();

while($row = mysqli_fetch_assoc($result)) {
   $achievements[] = $row;
}
mysqli_close($conn);

// DELETE AT SOME POINT

//$aID=array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
//$aTitle=array("Lorem","ipsum","dolor","sit","amet","consectetur","adipiscing","elit","Duis","sagittis");
//$aDesc=array("Lorem D", "ipsum D", "dolor D", "sit D", "amet D", "consectetur D", "adipiscing D", "elit D", "Duis D", "sagittis D");
//$aValue=array(10, 20, 30, 10, 20, 30, 10, 20, 30, 10);
//$aPic=array("goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg", "goat.jpg");