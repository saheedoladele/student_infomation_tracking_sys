<?php

include_once 'db.php';
$matNo = htmlspecialchars($_POST['matNo']);

$getQL1 = "SELECT * FROM student_tbl WHERE matricno='$matNo'";
$result1 = $conn->query($getQL1);
$count1 = $result1->num_rows;
if($count1 > 0){
    $row = $result1->fetch_assoc();
    echo json_encode(array('status'=>1,'surname'=>$row['surname'],'othername'=>$row['othername'],'gender'=>$row['gender'],'department'=>$row['department'],'level'=>$row['level'],'dob'=>$row['dob']));
}else{
echo json_encode(array('status'=>0,'msg'=>'No Record'));

}

$conn->close();
