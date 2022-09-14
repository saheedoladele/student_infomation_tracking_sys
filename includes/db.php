<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'student_info';

//connection 
 $conn = mysqli_connect($host, $username, $password, $database); 
 if(!$conn){
 	echo "Database Connection Fail";
 }
?>