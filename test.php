<?php
    require_once 'includes/db.php';

    $getQL1 = "SELECT 
                    extra_tbl.remark, 
                    extra_tbl.details, 
                    student_tbl.surname, 
                    accademic_tbl.gpa
                FROM student_tbl
                JOIN accademic_tbl
                  ON student_tbl.matricno = accademic_tbl.matricno
                JOIN extra_tbl
                  ON extra_tbl.matricno = accademic_tbl.matricno";

$result1 = $conn->query($getQL1);
$count1 = $result1->num_rows;

echo $count1;