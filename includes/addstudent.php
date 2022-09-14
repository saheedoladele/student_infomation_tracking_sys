<?php

include_once 'db.php';
 

$surname = htmlspecialchars($_POST['surname']);
$othername = htmlspecialchars($_POST['othername']);
$email = htmlspecialchars($_POST['email']);
$phoneno = htmlspecialchars($_POST['phoneno']);
$p_phone = htmlspecialchars($_POST['p_phone']);
$matricno = htmlspecialchars($_POST['matricno']);

$dept = htmlspecialchars($_POST['dept']);
$level = htmlspecialchars($_POST['level']);
$gender = htmlspecialchars($_POST['gender']);
$dob = htmlspecialchars($_POST['dob']);
$fullname = htmlspecialchars($_POST['fullname']);

$p_address = htmlspecialchars($_POST['p_address']);
$relationship = htmlspecialchars($_POST['relationship']);


$getQL1 = "SELECT * FROM student_tbl WHERE matricno='$matricno'";
$result1 = $conn->query($getQL1);
$count1 = $result1->num_rows;
if($count1 > 0){
    echo json_encode(array('status'=>0,'msg'=>'Student Already Exist'));
}else{

 $sql = "INSERT INTO student_tbl (matricno,surname,othername,gender,phoneno,email,address,department,level,dob,parent_name,relationship,parent_address,parent_phoneno)
VALUES ('$matricno', '$surname', '$othername','$gender','$phoneno','$email','$address','$dept','$level','$dob','$fullname','$relationship','$p_address','$p_phone')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('status'=>1,'msg'=>'Student Added Successfully!'));
   
} else {
    echo json_encode(array('status'=>2,'msg'=>'ERROR'.$conn->error));
}
}

$conn->close();

