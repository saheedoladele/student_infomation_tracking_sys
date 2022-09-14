<?php
include_once 'session.php';
include_once 'includes/db.php';
$username = $_SESSION['username'];

//get total students 
$sql = "SELECT * FROM student_tbl";
$result = $conn->query($sql);
$totalStudent = $result->num_rows;

//get ND Studens

$sqlND = "SELECT * FROM student_tbl WHERE level='ND1' || level='ND2' ";
$resultND = $conn->query($sqlND);
$ND = $resultND->num_rows;

//get HND Studens

$sqlHND = "SELECT * FROM student_tbl WHERE level='HND1' || level='HND2'";
$resultHND = $conn->query($sqlHND);
$HND = $resultHND->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::Student Information Tracking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="font/css/font-awesome.min.css">
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/fav.png">
<link rel="stylesheet" href="css/dashboard.css">
<style>
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
        border-radius:0px !important;
    }
    #show .card .card-header{
      background-color:dimgrey !important;
      color:white !important;
      border-radius:0px !important;
    }
    #show .card .card-header h3{
      font-size:20px;
      font-family: 'San Serif';
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
   
</style>
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="images/fss.png" style="width:200px; height:35px;"></a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Welcome! <?= $username ?></a>
    </li>
  </ul>

</nav>



<div class="container-fluid">
  <div class="row">
    <?php 

        include_once 'sidebar.php';
?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            This week
          </button> -->
        </div>
      </div>

     <div class="row">
        <div class="col-lg-3 col-sm-12 col-md-4 card text-white bg-success mb-3">
        <div class="card-header card-1"><i class="fa fa-user-circle"></i> ND Students</div>
            <div class="card-body text-center card-1">
           
                <h4 class=""><?= $ND ?> Available </h4>
              
            </div>
        </div>
        
        

        <div class="col-lg-3 col-sm-12 col-md-4  card text-white bg-info mb-3">
        <div class="card-header card-2"><i class="fa fa-graduation-cap"></i> HND Students</div>
            <div class="card-body text-center card-2">
                <h4 class="card-title"><?= $HND ?> Available</h4>
               
               
            </div>
        </div>
       

        <div class="col-lg-3 col-sm-12 col-md-4  card text-white bg-secondary mb-3">
        <div class="card-header card-4"><i class="fa fa-graduation-cap"></i> Total Students</div>
            <div class="card-body text-center">
                <h4 class="card-title text-center card-4"><?= $totalStudent ?> Available</h4>
     
                
            </div>
        </div>
     </div>

     <hr>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="show">
      <div class="card">
          <div class="card-header">
            <h3>Top Performance</h3>
          </div>
          <div class="card-body">
            <table class="table table-sm table-striped" id="result">
            <thead>
              <tr>
                <th>Matric No</th>
                <th>Level</th>
                <th>Semester</th>
                <th>GPA</th>
              </tr>
            </thead>
            <tbody>
            <?php
                        $getQL2 = "SELECT * FROM accademic_tbl  ORDER BY id DESC LIMIT 5";
                        $result2 = $conn->query($getQL2);
                        $count2 = $result2->num_rows;

                        if($count2 > 0){
                            while ($row = $result2->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>'.$row['matricno'].'</td>';
                                echo '<td>'.$row['level'].'</td>';
                                echo '<td>'.$row['semester'].'</td>';
                                echo '<td>'.$row['gpa'].'</td>';
                                echo '</tr>';
                            }
                            
                        }else{
                        echo '<tr><td colspan=8>No Record Yet </td></tr>';

                        }
                      //  $conn->close();

                        ?>
            </tbody>
            </table>
          </div>
          <div class="card-footer">
                      <a href="list_result.php?title=Accademic Performance" class="btn btn-secondary">Show All</a>
          </div>
      </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="show">
      
  <div class="card">
          <div class="card-header">
            <h3>Recent Exra Record</h3>
          </div>
          <div class="card-body">
          <table class="table table-sm table-striped" id="extra">
            <thead>
              <tr>
                <th>Matric No</th>
                <th>Remark</th>
                <th>Details</th>
                <th>Date</th>
              </tr>
            </thead>
            
            <tbody>
            <?php
                        $getQL1 = "SELECT * FROM extra_tbl  ORDER BY id DESC LIMIT 5";
                        $result1 = $conn->query($getQL1);
                        $count1 = $result1->num_rows;

                        if($count1 > 0){
                            while ($row = $result1->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>'.$row['matricno'].'</td>';
                                echo '<td>'.$row['remark'].'</td>';
                                echo '<td>'.$row['details'].'</td>';
                                echo '<td>'.$row['date_created'].'</td>';
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
          <div class="card-footer">
                      <a href="list_extra.php" class="btn btn-secondary">Show All</a>
          </div>
      </div>

  </div>

</div>
<hr>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="show">
<div class="card">
          <div class="card-header">
            <h3><i class="fa fa-search"> </i>Quick Search</h3>
          </div>
          <div class="card-body">
                        New Details
          </div>
  </div>
</div>      
</div>  
    </main>
  </div>
</div>

<hr>
<footer>
    <div class="container">
    <p> Copyright 2020</p>
    </div>
</footer>
<!--js file -->

<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
<script 
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
            crossorigin="anonymous"></script>
            <script src="js/script.js"></script>
</body>
</html>

<script>
$(document).ready(function() {
    $('#result').DataTable();

    $('#extra').DataTable();
} );
</script>