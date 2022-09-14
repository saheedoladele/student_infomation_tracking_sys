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
            <h3>Add Student</h3>
        </div>
        <div class="card-body">
           
            <p id="error"> </p>
            <div class="row">
                <div class="col-lg-4">
                <label for="matricno"><b>Matric No</b> </label>
                    
                    <input type="text" name="matricno" id="matricno" placeholder="Matric No" class="form-control">
                </div>
                <div class="col-lg-4">
                <label for="dept"><b>Department</b> </label>
                    <select name="dept" id="dept" class="form-control">
                        <option>::Select</option>
                        <option>Computer Science</option>
                        <option>Statistics</option>
                        <option>Bus Admin</option>
                    </select>
                </div>
                <div class="col-lg-4">
                <label for="level"><b>Level</b> </label>
                <select name="level" id="level" class="form-control">
                        <option>::Select</option>
					<option>ND1</option>
					<option>ND2</option>
					<option>HND1</option>
					<option>HND2</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label for="surname"><b>Surname</b> </label>
                    <input type="text" name="surname" id="surname" placeholder="Enter Surname" class="form-control">
                    <p id="errN"></p>
                </div>
                <div class="col-lg-6">
                <label for="surname"><b>Othernames</b> </label>
                    <input type="text" name="othername" id="othername" placeholder="Enter Othernames" class="form-control">
                    <p id="errL"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                <label for="surname"><b>Gender</b> </label>
                    <select name="gender" id="gender" class="form-control">
                        <option>::Select</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-lg-6">
                <label for="surname"><b>Date of Birth</b> </label>
                    <input type="date" name="dob" id="dob" placeholder="DOB" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label for="surname"><b>Phone Number</b> </label>
                    <input type="phone" name="phoneno" id="phoneno" placeholder="0801-1111-111" class="form-control">
                    <p id="errP"></p>
                </div>
                <div class="col-lg-6">
                <label for="surname"><b>Email Address</b> </label>
                    <input type="email" name="email" id="email" placeholder="info@example.com" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12"> 
                <label for="surname"><b>Home Address</b> </label>
                   <textarea name="address" id="address" cols="30" rows="5" placeholder="Home Address" class="form-control"></textarea>
                </div>
            </div>
            <hr>
           <span class="text-muted">PARENT/GUARDIAN INFO</span>
            <div class="row">
                <div class="col-lg-6">
                    <label for="fullname"><b>Full Name</b> </label>
                    <input type="text" name="fullname" id="fullname" placeholder="Enter Full Name" class="form-control">
                    <p id="errPN"></p>
                </div>
                <div class="col-lg-6">
                <label for="p_address"><b>Parent Address</b> </label>
                    <input type="text" name="p_address" id="p_address" placeholder="Enter Address" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                <label for="relationship"><b>Relationship</b> </label>
                    <select name="relationship" id="relationship" class="form-control">
                        <option>::Select</option>
                        <option>Father</option>
                        <option>Mother</option>
                        <option>Uncle</option>
                        <option>Aunty</option>
                    </select>
                </div>
                <div class="col-lg-6">
                <label for="p_phone"><b>Phone No</b> </label>
                    <input type="text" name="p_phone" id="p_phone" placeholder="Phone No" class="form-control">
                    <p id="errW"></p>
                </div>
            </div>

<br>
            <div class="row">
                <div class="col-lg-6"> 
               <button class="btn btn-secondary" id="addStudent"><i class="fa fa-save"></i> Save Record</button>
               <span id="sending"> </span>
                </div>
            </div>

            
            <hr>
		

        <p class="alert alert-secondary">
                <b>Note</b> you can import excel sheet, click on Download template button to download. <a  href="sample/sample_record.csv" class="btn btn-secondary btn-sm"><i class="fa fa-download"></i> Download</a>
            </p>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label><strong>Select Level:</strong></label>
				<select name="sLevel" id="sLevel" class="form-control" style="background-color: transparent; border-bottom-style: solid; border-bottom-color: rgb(60,179,113); border-bottom-width: 2px; color: rgb(60,179,113);">
					<option>--Level--</option>
					<option>ND1</option>
					<option>ND2</option>
					<option>HND1</option>
					<option>HND2</option>
				</select>
			</div>
			<div class="form-group">
				<label>Choose File(.csv, xlv)</label>
				<input type="file" name="file" class="form-control">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-sm" type="submit" name="upload"><i class="icon-upload"></i> Upload</button>
			</div>
		</form>
		<?php
		if(isset($_POST['upload'])){
			include_once 'includes/importStudent.php';
		}
		?>

        </div>
    </div>
    </main>
  </div>
</div>

<footer style="margin-top:100px;">
    <div class="container text-center">
    <p> Copyright 2020, FSS -Ibadan</p>
    </div>
</footer>
<!--js file -->

<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous"></script>
              <!-- <script src="js/jquery.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script 
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
            crossorigin="anonymous"></script>
           <script src="js/script.js"></script>
</body>
</html>
