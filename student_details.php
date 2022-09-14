<?php 
include_once 'includes/db.php';
$matno = $_GET['matricno'];
$getQL1 = "SELECT * FROM student_tbl WHERE matricno ='$matno'";
$result1 = $conn->query($getQL1);

$row = $result1->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::Student Information Tracking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/6ce1a06647.js" crossorigin="anonymous"></script> -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="font/css/font-awesome.min.css">
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/fav.png">
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    <body>
    *{
        color: grey;
    }
        {
            font-weight:normal !important;
            font-family: times !important;
        }
    </body>
    .navbar{
        border-bottom:1px solid :#CB640A;
        box-shadow: 3px 3px 3px #CB640A;
    }
    .container{
        margin-top:30px;
    }
    .tc{
        font-family: serif;
        font-size:13px;
        height:200px;
        overflow:scroll;
        background-color: gainsboro;
        color: #CB640A;
    }
    .sidebar{
        margin-top:30px;
        line-height:30px;
    }
    .card{
        margin-left:10px;
    }
    .card-1{
    color:rgb(174, 230, 174);
    
}
.card-2{
    
    color:rgb(152, 188, 235);
}
.card-3{
    
    color:rgb(233, 223, 178);
}
.card-4{
    
 
    color:rgb(152, 188, 235);
}
.contents{
    color: rgb(30, 83, 30);
    font-size: 13px;
    font-weight: bold;
    border:0px solid green;
    padding-top: 20px;
}
.lines{
    line-height: 30px;
    font-size: 16px;
    font-family: times;

}
.lines:hover{
    margin-left: 10px;
    transition: ease-in .5s;
    cursor: pointer;
    background: #f0f2f5;

}
.lines span{
    margin-left:14px;
}
.title{
width: 500px;
background: green;
border: 1px solid red;
}
.val{
    width: 500px;
    background: red;
    border: 1px solid red;
    margin-left: 20px;
}
.success{
    color:green !important;
    margin-left: 5px;
}
.danger{
    color:red !important;
    margin-left: 5px;
}
   
</style>
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="images/fss.png" style="width:200px; height:35px;"></a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <?php 
        $page_tittle = $_GET['title'];
        include_once 'sidebar.php';
?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $page_tittle ?></li>
            </ol>
        </nav>

        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
           
          </div>
          
        </div>
      </div>

      <!--Card -->
      <div class="card">
        <div class="card-header">
            <h5>STUDENT: <?= $row['surname'].' '.$row['othername'] ?> </h5>
        </div>
        <div class="card-body">
            <?php 
                $profileImg = "picture/".$row['photo'] ? "picture/".$row['photo'] : "picture/domin.jpeg";
            ?>
          <div class="contents">
                   <!--begin--> 
                   <div class="row">
                       <div class="col-lg-3">
                       <img src="<?php echo $profileImg ?>" class="rounded float-right img-thumbnail" alt="Profile Image" width="140" height="140">
                       </div>
                       <div class="col-lg-6">
                       <span class="text-muted">STUDENT'S INFORMATION</span>
                           <table class="table table-sm">
                           <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>matric number:</span></td><td style="font-weight:normal; line-height:30px;"><span id="matno"><?= $row['matricno'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>Full Name:</span></td><td style="font-weight:normal; line-height:30px;"><span id="fname"><?= $row['surname'].' '.$row['othername'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>dob:</span></td><td style="font-weight:normal; line-height:30px;"><span id="dob"><?= $row['dob'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>gender:</span></td><td style="font-weight:normal; line-height:30px;"><span id="gender"><?= $row['gender'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>email email:</span></td><td style="font-weight:normal; line-height:30px;"><span id="email"><?= $row['email'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>phone number:</span></td><td style="font-weight:normal; line-height:30px;"><span id="phone"><?= $row['phoneno'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>home address:</span></td><td style="font-weight:normal; line-height:30px;"><span id="address"><?= $row['address'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>department:</span></td><td style="font-weight:normal; line-height:30px;"><span id="department"><?= $row['department'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>level:</span></td><td style="font-weight:normal; line-height:30px;"><span id="level"><?= $row['level'] ?></span></td>
                                </tr>

                              
                           </table>
                           
                           <hr>
                           <span class="text-muted">PARENT INFORMATION</span>
                           <table class="table table-sm">
                           <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>Name:</span></td><td style="font-weight:normal; line-height:30px;"><span id="name"><?= $row['parent_name'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>Relationship:</span></td><td style="font-weight:normal; line-height:30px;"><span id="relation"><?= $row['relationship'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>home address:</span></td><td style="font-weight:normal; line-height:30px;"><span id="pAddress"><?= $row['parent_address'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>phone number:</span></td><td style="font-weight:normal; line-height:30px;"><span id="pPhone"><?= $row['parent_phoneno'] ?></span></td>
                                </tr>
                              

                              
                           </table>
                           <div class="accademic">
                                <?php
//gtting result
$getResult = "SELECT * FROM accademic_tbl WHERE matricno='$matno'";
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
echo $output;
                                ?>
                           </div>
                          <div class="extra">
                          <?php
//gtting extra record
$getExtra = "SELECT * FROM extra_tbl WHERE matricno='$matno'";
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
echo $outputs;
                          ?>
                          </div>
                          
                         
                       </div>
                   </div>
                   <!--end --> 
         </div>
    </div>


    </main>
  </div>
</div>


<footer style="margin-top:100px;">
    <div class="container text-center">
    <p> Copyright <?php echo date('Y') ?>, Department of Computer Science,  The Polytechnic, Ibadan</p>
    </div>
</footer>
<!--js file -->

<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script 
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script src="js/script.js"></script>
</body>
</html>

<script>
$(document).ready(function() {
    $('#students').DataTable();
} );
</script>


    
