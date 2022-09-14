<?php
session_start();
include_once 'db.php';
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$getQL1 = "SELECT * FROM users WHERE username='$username' and password='$password'";
$result1 = $conn->query($getQL1);
$count1 = $result1->num_rows;
if($count1 > 0){
    $row = $result1->fetch_assoc();
    echo json_encode(array('status'=>1,'username'=>$row['username'],'msg'=>'Welcome, Login Successful!'));
}else{
echo json_encode(array('status'=>0,'msg'=>'Invalid login parameter'));

}
$_SESSION['username'] = $username;
$conn->close();
