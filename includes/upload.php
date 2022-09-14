<?php
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = '../picture';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3 
    $filname = $_FILES['file']['name'];        
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5

    //before moving the uploaded file, check some validations
    //file type, file size

 
    move_uploaded_file($tempFile,$targetFile); //6
    echo "Done";
     
}
?> 