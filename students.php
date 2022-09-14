<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>codeWithMe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6ce1a06647.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/style.css">
<!-- Favicon -->
<link rel="icon" type="image/png" href="../images/fav.png">
<link rel="stylesheet" href="../css/dashboard.css">
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
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="../images/logo.png" style="width:200px; height:35px;"></a>
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

        include_once 'sidebar.php';
?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Students</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            This week
          </button>
        </div>
      </div>

    
      <div class="card border-warning">
        <div class="card-header"> <h3><i class="fa fa-list"></i> Applicants</h3></div>
        <div class="card-body text-warning">
       
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="applicants">
          <thead>
            <tr>
              <th>#</th>
              <th>Email</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone No</th>
              <th>Period</th>
            </tr>
          </thead>
          <tbody>
          <?php  
            include_once '../includes/db.php';
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['firstName'] ?></td>
              <td><?php echo $row['lastName'] ?></td>
              <td><?php echo $row['wphoneNo'] ?></td>
              <td><?php echo $row['period'] ?></td>
            </tr>
            <?php   } ?>
          </tbody>
        </table>
      </div>
        </div>
      </div>
    </main>
  </div>
</div>

<hr>
<footer>
    <div class="container">
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
            <script src="../js/script.js"></script>
</body>
</html>

<script>
$(document).ready(function() {
    $('#applicants').DataTable();
} );
</script>