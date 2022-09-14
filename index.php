<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information tracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/fav.png">
<style>
    .logo{
        text-align:center;
        padding-bottom:20px;
    }
    .card-header{
        background: #16874F;
        color:white;
    }
    .card{
        border:1px solid #16874F;
        border-bottom:4px solid #16874F
    }
   
</style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
           <div class="logo">
                <img src="images/logos.png" alt="FSS logo">
           </div>
            <div class="card">
                <div class="card-header">
                    <h5>User Login</h5>
                </div>
                <div class="card-body">
                        <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-secondary" id="login"><i class="fa fa-sign-in"> </i> Login </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<hr>
<footer class="text-center">
    
<p> Copyright <?php echo date('Y') ?>, Department of Computer Science,  The Polytechnic, Ibadan</p>

</footer>



<!--js file -->

<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
<script 
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
            crossorigin="anonymous"></script>
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script src="js/script.js"></script>
</body>
</html>