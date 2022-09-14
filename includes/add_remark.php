<?php

include_once 'db.php';
 
$matNo = htmlspecialchars($_POST['matNo']);
$details = htmlspecialchars($_POST['details']);
$remark = htmlspecialchars($_POST['remark']);


$getQL1 = "SELECT * FROM extra_tbl WHERE matricno='$matNo' and remark='$remark'";
$result1 = $conn->query($getQL1);
$count1 = $result1->num_rows;
if($count1 > 0){
    echo json_encode(array('status'=>0,'msg'=>'Already Exist'));
}else{

 $sql = "INSERT INTO extra_tbl (matricno,remark,details) VALUES ('$matNo', '$remark','$details')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('status'=>1,'msg'=>'Remark Added Successfully!'));
   
} else {
    echo json_encode(array('status'=>2,'msg'=>'ERROR'.$conn->error));
}
}

$conn->close();

