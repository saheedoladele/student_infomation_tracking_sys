<?php

include_once 'db.php';
    
    $ok = true;
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    if ($file == NULL) {
      error(_('Please select a file to import'));
      //redirect(page_link_to('admin_export'));
    }
    else {
      while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
        {
          $matricno = $filesop[0];
          $surname = $filesop[1];
          $othername = $filesop[2];
          $gender = $filesop[3];
          $phoneno = $filesop[4];
          $email = $filesop[5];
          $address = $filesop[6];
          $department = $filesop[7];
          $level = $filesop[8];
          $dob = $filesop[9];
          $parent_name = $filesop[10];
          $relationship = $filesop[11];
          $parent_address = $filesop[12];
          $parent_phoneno = $filesop[13];
         


 // If the tests pass we can insert it into the database.       
        if ($ok) {
          $sql = mysqli_query($conn,"
            INSERT INTO student_tbl SET
            matricno ='" . mysqli_real_escape_string($conn,$matricno) . "',
            surname ='" . mysqli_real_escape_string($conn,$surname) . "',
            othername='" . mysqli_real_escape_string($conn,$othername) . "',
            gender='" . mysqli_real_escape_string($conn,$gender) . "',
            phoneno='" . mysqli_real_escape_string($conn,$phoneno) . "',
            email='" . mysqli_real_escape_string($conn,$email) . "',
           
            address='" . mysqli_real_escape_string($conn,$address) . "',
            department='" . mysqli_real_escape_string($conn,$department) . "',
            level='" . mysqli_real_escape_string($conn,$level) . "',
            dob='" . mysqli_real_escape_string($conn,$dob) . "',
            parent_name='" . mysqli_real_escape_string($conn,$parent_name) . "',
            relationship='" . mysqli_real_escape_string($conn,$relationship) . "',
            parent_address='" . mysqli_real_escape_string($conn,$parent_address) . "',
            parent_phoneno='" . mysqli_real_escape_string($conn,$parent_phoneno) . "'");
        }
      }

      if ($sql) {
        // success(_("You database has imported successfully!"));
        // redirect(page_link_to('admin_export'));
        echo '<p class="text-secondary"><i class="fa fa-check-circle"></i> Upload successfully</p>';

      } else {
        // error(_('Sorry! There is some problem in the import file.'));
        // redirect(page_link_to('admin_export'));
        // echo '<script> alert("Error Uploading file")</script>';
        echo mysqli_error($connect);
        }
    }

//}
