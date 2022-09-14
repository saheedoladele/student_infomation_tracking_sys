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
<link rel="stylesheet" href="css/dropzone.css">
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
.wrapper{
    margin-top: 20px;
    color: gray;
    font-size:16px;
    padding-left: 30px;

}
.button-row{
    margin-top: 25px;
}
.response{
    font-size: 16px;
    padding: 15px;
    color:white;
}
.response .error{
    background: red;
}
.response .success{
    background: green;
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
            <h5>Upload Photo</h5>
        </div>
        <div class="card-body">
            <p class="alert alert-secondary">
                <b>Note</b> You can search for student matric number OR enter it directly to the space provided.
            </p>
            
            <form id="frm-image-upload" action="upload_photo.php" name='img'
        method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">
                    <label for="department"><b></b> </label>
                    <select name="department" id="department" class="form-control">
                        <option>Select Department</option>
                        <option>Computer Science</option>
                        <option>Business Admin</option>
                        <option>Statistics</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="department"><b></b> </label>
                    <select name="level" id="level" class="form-control">
                        <option>Select Level</option>
					<option>ND1</option>
					<option>ND2</option>
					<option>HND1</option>
					<option>HND2</option>
                    </select>
                    <span id="getMat"></span>
                </div>
                <div class="col-lg-4">
                    <label for="department"><b></b> </label>
                    <select name="matricNo" id="matricNo" class="form-control">
                        <option>Select Matric Number</option>
                    </select>
                </div>

                <!--upload -->
           <div class="wrapper">
          
        <div class="form-row">
            <div>Choose Image file: (Size: <= 20kb, type: JPEG, JPG, PNG)</div>
            <div>
                <input type="file" class="file-input" name="file-input">
            </div>
        </div>

        <div class="button-row">
            <input type="submit" id="btn-submit" name="upload"
                value="Upload" class="btn btn-secondary">
        </div>

        <?php
        include_once 'includes/db.php';
       
if (isset($_POST["upload"])) {

    $matricNo = $_POST['matricNo'];
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
    $file_name = $_FILES["file-input"]["name"];
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        $response = array(
            "type" => "error",
            "message" => "Choose image file to upload."
        );
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            "message" => "Upload valiid images. Only PNG and JPEG are allowed."
        );
        echo $result;
    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 2000000)) {
        $response = array(
            "type" => "error",
            "message" => "Image size exceeds 2MB"
        );
    }    // Validate image file dimension
    else if ($width > "300" || $height > "200") {
        $response = array(
            "type" => "error",
            "message" => "Image dimension should be within 300X200"
        );
    } else {
        $target = "picture/" . basename($_FILES["file-input"]["name"]);
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
            $response = array(
                "type" => "success",
                "message" => "Image uploaded successfully."
            );
            //save to db
            $sql = "UPDATE student_tbl SET photo='$file_name' WHERE matricno = '$matricNo'";
            $query = mysqli_query($conn, $sql);
        } else {
            $response = array(
                "type" => "error",
                "message" => "Problem in uploading image files."
            );
        }
    }
    print_r($response);
}
?>

    </form>
           </div>
    <?php if(!empty($response)) { ?>
    <div class="response <?php echo $response["type"]; ?>"><?php echo $response["message"]; ?></div>
    <?php }?>

                <!--end -->
               
            </div>
<br>
            

         

<br>
            <!-- <div class="row">
                <div class="col-lg-6"> 
               <button class="btn btn-secondary"><i class="fa fa-save"></i> Save Record</button>
                </div>
            </div> -->
            

            

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
            <script src="js/script.js"></script>
            <script src="js/dropzone.js"></script>
</body>
</html>

