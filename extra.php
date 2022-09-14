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
            <h5>Add Student's Accdemic Performance</h5>
        </div>
        <div class="card-body">
           
            <div class="row">
                <div class="col-lg-7">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                    <label class="sr-only" for="mstricno">Matric Number</label>
                    <input type="text" class="form-control mb-2" id="matNo" placeholder="Matric Number">
                    </div>
                    <div class="col-auto">
                    <button class="btn btn-secondary btn-sm mb-2" id="go">Go <i class="fa fa-chevron-circle-right"></i></button>
                    </div>
                </div>
                </div> 
            </div>

           <div class="content">
           <div class="row">
                <div class="col-lg-4">
                    <label for="surname"><b>Full Name</b> </label>
                    <input type="text" name="fName" id="fName" placeholder="Enter Full Name" class="form-control">
                </div>
                <div class="col-lg-4">
                <label for="surname"><b>Department</b> </label>
                    <input type="text" name="depart" id="depart" readonly class="form-control">
                </div>
                <div class="col-lg-4">
                <label for="surname"><b>Level</b> </label>
                    <input type="text" name="lev" id="lev" readonly class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label for="surname"><b>Remark Title</b> </label>
                    <input type="text" name="remark" id="remark" placeholder="Enter Remark title" class="form-control">
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label for="details"><b>Remark Details</b> </label>
                    <textarea name="details" id="details" cols="30" rows="5" class="form-control" placeholder="Details"></textarea>
                </div>
                
            </div>
<br>
            <div class="row">
                <div class="col-lg-6"> 
               <button class="btn btn-secondary" id="save_rem"><i class="fa fa-save"></i> Save Record</button>
                </div>
            </div>
           </div>
            

            

        </div>
    </div>


    </main>
  </div>
</div>


<footer style="margin-top:100px;">
    <div class="container text-center">
    <p> Copyright <?php echo date('Y') ?>, The polytechnic -Ibadan</p>
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
