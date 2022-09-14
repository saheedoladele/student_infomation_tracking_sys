<?php

include_once 'db.php';
$matNo = htmlspecialchars($_POST['matNo']);

//$getQL1 = "SELECT * FROM student_tbl WHERE matricno='$matNo'";

// $getQL1 = "SELECT *
//             FROM student_tbl
//             INNER JOIN accademic_tbl ON student_tbl.matricno = accademic_tbl.matricno
//             INNER JOIN extra_tbl ON accademic_tbl.matricno = extra_tbl.matricno WHERE accademic_tbl.matricno ='$matNo'";

$getQL1 = "SELECT *
            FROM student_tbl
             WHERE matricno ='$matNo'";

$result1 = $conn->query($getQL1);
$count1 = $result1->num_rows;

//gtting result
$getResult = "SELECT * FROM accademic_tbl WHERE matricno='$matNo'";
$res = $conn->query($getResult);
$count = $res->num_rows;
$output = '<hr>
<span class="text-muted">ACCADEMIC PERFORMANCE</span>
<table class="table table-striped table-sm" style="font-weight:normal !important;">
            <thead>
            <tr>
                <th>Level</th><th>Semester</th><th>GPA</th>
            </tr>
            </thead>';
if($count > 0){
    while ($row = $res->fetch_assoc()) {
        $output .= '
            <tbody>
                <tr>
                    <td>'.$row['level'].'</td><td>'.$row['semester'].'</td><td>'.$row['gpa'].'</td>
                </tr>
            </tbody>
        ';
    }
    $output .='</table>';
}else{
    $output .= '<table class="table table-striped table-sm" style="font-weight:normal !important;">
    <thead>
    <tr>
       <th>Level</th><th>Semester</th><th>GPA</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="3" style="color:red !important;">No Accademic Record Found</td>
        </tr>
    </tbody>
</table>';
}//end accademic

//gtting extra record
$getExtra = "SELECT * FROM extra_tbl WHERE matricno='$matNo'";
$res1 = $conn->query($getExtra);
$count2 = $res1->num_rows;
$outputs = '<hr>
<span class="text-muted">ADDITIONAL INFO</span>
<table class="table table-striped table-sm" style="font-weight:normal !important;">
            <thead>
            <tr>
                <th>Remark</th><th>Details</th><th>Date</th>
            </tr>
            </thead>';
if($count2 > 0){
    while ($row = $res1->fetch_assoc()) {
        $outputs .= '
            <tbody>
                <tr>
                    <td>'.$row['remark'].'</td><td>'.$row['details'].'</td><td>'.$row['date_created'].'</td>
                </tr>
            </tbody>
        ';
    }
    $outputs .='</table>';
}else{
    $outputs .= '<table class="table table-striped table-sm" style="font-weight:normal !important;">
    <thead>
    <tr>
       <th>Remark</th><th>Details</th><th>Date</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="3" style="color:red !important;">No Extral Record Found</td>
        </tr>
    </tbody>
</table>';
}//end accademic



if($count1 > 0){
    $row = $result1->fetch_assoc();
    echo json_encode(array('status'=>1,'surname'=>$row['surname'],'othername'=>$row['othername'],'gender'=>$row['gender'],'department'=>$row['department'],'level'=>$row['level'],'dob'=>$row['dob'],'phoneno'=>$row['phoneno'],'email'=>$row['email'],'parent_name'=>$row['parent_name'],'parent_address'=>$row['parent_address'],'parent_phoneno'=>$row['parent_phoneno'],'relationship'=>$row['relationship'],'matno'=>$row['matricno'],'output'=>$output,'outputs'=>$outputs));
}else{
echo json_encode(array('status'=>0,'msg'=>'No Record'));

}

$conn->close();
