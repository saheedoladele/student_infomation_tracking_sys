<?php

include_once 'db.php';
$level = htmlspecialchars($_POST['level']);
$department = htmlspecialchars($_POST['department']);

$getQL1 = "SELECT * FROM student_tbl WHERE level='$level' and department ='$department'";
$result1 = $conn->query($getQL1);
$count1 = $result1->num_rows;
if($count1 > 0){
    while ($row = $result1->fetch_assoc()) {
        echo '<option>' .$row['matricno']. '</option>';
    } 
}else{
echo 'No record found';

}

$conn->close();
