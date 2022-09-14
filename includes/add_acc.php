<?php

include_once 'db.php';
 
$matNo = htmlspecialchars($_POST['matNo']);
$gpa = htmlspecialchars($_POST['gpa']);
$level = htmlspecialchars($_POST['level']);
$semester = htmlspecialchars($_POST['semester']);

$getQL1 = "SELECT * FROM accademic_tbl WHERE matricno='$matNo' and level='$level' and semester='$semester'";
$result1 = $conn->query($getQL1);
$count1 = $result1->num_rows;
if($count1 > 0){
    echo json_encode(array('status'=>0,'msg'=>'Already Exist'));
}else{

 $sql = "INSERT INTO accademic_tbl (matricno,gpa,level,semester) VALUES ('$matNo', '$gpa','$level','$semester')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('status'=>1,'msg'=>'Accademic Record Added Successfully!'));
   
} else {
    echo json_encode(array('status'=>2,'msg'=>'ERROR'.$conn->error));
}
}

$conn->close();

