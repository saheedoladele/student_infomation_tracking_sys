<?php 
include_once 'includes/db.php';
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
            <h5>Track Student</h5>
        </div>
        <div class="card-body">
            
          <div class="contents">
                   <!--accordion -->

                   <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Individual Search
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
           <div class="row">
                <div class="col-lg-7">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                    <label class="sr-only" for="mstricno">Matric Number</label>
                    <input type="text" class="form-control mb-2" id="matNo" placeholder="Matric Number">
                    </div>
                    <div class="col-auto">
                    <button class="btn btn-secondary btn-sm mb-2" id="track">Track Info <i class="fa fa-chevron-circle-right"></i></button>
                <span id="searching" style="color:grey;"></span>    
                </div>
                </div>
                </div> 
            </div>
            <hr>
            <div class="tracked">
            <div class="row">
                       <div class="col-lg-3">
                       <img src="picture/domin.jpeg" class="rounded float-right img-thumbnail" alt="Profile Image" width="140" height="140">
                       </div>
                       <div class="col-lg-6">
                       <span class="text-muted">STUDENT'S INFORMATION</span>
                           <table class="table table-sm">
                           <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>matric number:</span></td><td style="font-weight:normal; line-height:30px;"><span id="matno"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>Full Name:</span></td><td style="font-weight:normal; line-height:30px;"><span id="fname"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>dob:</span></td><td style="font-weight:normal; line-height:30px;"><span id="dob"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>gender:</span></td><td style="font-weight:normal; line-height:30px;"><span id="gender"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>email email:</span></td><td style="font-weight:normal; line-height:30px;"><span id="email"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>phone number:</span></td><td style="font-weight:normal; line-height:30px;"><span id="phone"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>home address:</span></td><td style="font-weight:normal; line-height:30px;"><span id="address"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>department:</span></td><td style="font-weight:normal; line-height:30px;"><span id="department"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>level:</span></td><td style="font-weight:normal; line-height:30px;"><span id="level"></span></td>
                                </tr>

                              
                           </table>
                           
                           <hr>
                           <span class="text-muted">PARENT INFORMATION</span>
                           <table class="table table-sm">
                           <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>Name:</span></td><td style="font-weight:normal; line-height:30px;"><span id="name"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>Relationship:</span></td><td style="font-weight:normal; line-height:30px;"><span id="relation"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>home address:</span></td><td style="font-weight:normal; line-height:30px;"><span id="pAddress"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; text-transform:uppercase; line-height:30px;"><span>phone number:</span></td><td style="font-weight:normal; line-height:30px;"><span id="pPhone"></span></td>
                                </tr>
                              

                              
                           </table>
                           <div class="accademic">
                           
                           </div>
                          <div class="extra">
                          
                          </div>
                          
                         
                       </div>
                   </div>
            </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          General Search
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <table class="table table-sm table-hover table-stripped" id="students" style="font-weight:normal !important;">
               <thead>
                   <tr>
                       <th>Matric No</th>
                       <th>Name(s)</th>
                       <th>Gender</th>
                       <th>Dob</th>
                       <th>Phone No</th>
                       <th>Email</th>
                       <th>Department</th> 
                       <th>Level</th>
                       <th>DOB</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
 
                <?php
$getQL1 = "SELECT * FROM student_tbl";

// $getQL1 = "SELECT *
//             FROM student_tbl
//             INNER JOIN accademic_tbl ON student_tbl.matricno = accademic_tbl.matricno
//             INNER JOIN extra_tbl ON accademic_tbl.matricno = extra_tbl.matricno";

$result1 = $conn->query($getQL1);
$count1 = $result1->num_rows;

if($count1 > 0){
    while ($row = $result1->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$row['matricno'].'</td>';
        echo '<td> <a  href="student_details.php?title=Student Details&matricno='.$row['matricno'].'">'.$row['surname'].' '.$row['othername'].'</a></td>';
        echo '<td>'.$row['gender'].'</td>';
        echo '<td>'.$row['dob'].'</td>';
        echo '<td>'.$row['phoneno'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['department'].'</td>';
        echo '<td>'.$row['level'].'</td>';
        echo '<td>'.$row['dob'].'</td>';
        echo '<td><a class="btn btn-sm btn-success" href="student_details.php?title=Student Details&matricno='.$row['matricno'].'"><i class="fa fa-eye"></i></a></td>';
        echo '</tr>';
    }
    
}else{
echo '<tr><td colspan=8>No Record Yet </td></tr>';

}
$conn->close();

?>
               </tbody>
           </table>
      </div>
    </div>
  </div>
  
</div>
                   <!--end accordior -->


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


    
