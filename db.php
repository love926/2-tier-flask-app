<?php

$host = "database-13.cn04ekcyuel1.us-east-2.rds.amazonaws.com";
$user = "admin";
$password = "Ali123456^";
$database = "myappdb";

$conn = new mysqli($host,$user,$password,$database);

if($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}

?>

