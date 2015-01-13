<?php
$dbhost = 'localhost';
$dbuser = 'test';
$dbpass = 'test';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$sql = "CREATE TABLE `Achievement Progress` (
  `User ID` int(32) unsigned NOT NULL,
  `Achievement ID` int(32) unsigned NOT NULL,
  `Achievement Progress` int(3) unsigned NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`User ID`),
  KEY `Achievement` (`Achievement ID`),
  CONSTRAINT `Achievement` FOREIGN KEY (`Achievement ID`) REFERENCES `Achievements` (`Achievement ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

mysql_select_db('test');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not create table: ' . mysql_error());
}
echo "Table employee created successfully\n";
mysql_close($conn);
?>