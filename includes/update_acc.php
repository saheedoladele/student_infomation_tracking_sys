<?php

include_once 'db.php';
 
$matNo = htmlspecialchars($_POST['matNo']);
$gpa = htmlspecialchars($_POST['gpa']);
$level = htmlspecialchars($_POST['level']);
$semester = htmlspecialchars($_POST['semester']);



 $sql = "UPDATE accademic_tbl SET gpa='$gpa', semester = '$semester' WHERE matricno='$matNo' and semester ='$semester'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('status'=>1,'msg'=>'Accademic Record Updated Successfully!'));
   
} else {
    echo json_encode(array('status'=>0,'msg'=>'ERROR'.$conn->error));
}


$conn->close();

