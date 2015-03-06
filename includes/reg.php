<?php 

require_once('../config.php');

$conn = mysqli_connect("localhost", 'testing', 'testing', 'testing');




$stmt = $conn->prepare("INSERT INTO Users (id) VALUES (?)");
$stmt->bind_param("i", $UIDr);
$UIDr = time() . rand(100,1000000);
$stmt->execute();


$conn->close();

