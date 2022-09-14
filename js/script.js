$(document).ready(function(){
    $('.content').hide();
    $('.tracked').hide();
    $('#update_acc').hide();
    var $regexname=/^([a-zA-Z]{3,30})$/;
    var $regexPhone=/^([0-9]{11})$/;
  
    $('#surname').on('keypress keydown keyup',function(){
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                // $('#errN').removeClass('hidden');
                 $('#errN').addClass('err');
                 $('#errN').html('<i class="fa fa-warning"></i> Please Enter a valid Surname')
                 $('#errN').show();
             }
           else{
                // else, do not display message
                $('#errN').addClass('valid');
                $('#errN').html('<i class="fa fa-check-circle"></i> Valid Surname')
               }
         });
//validate Last Name
         $('#othername').on('keypress keydown keyup',function(){
            if (!$(this).val().match($regexname)) {
             // there is a mismatch, hence show the error message
               // $('#errN').removeClass('hidden');
                $('#errL').addClass('err');
                $('#errL').html('<i class="fa fa-warning"></i> Please Enter a valid Last Name')
                $('#errL').show();
            }
          else{
               // else, do not display message
               $('#errL').addClass('valid');
               $('#errL').html('<i class="fa fa-check-circle"></i> Valid Last Name')
              }
        });

        //validate Full Name
        $('#fullname').on('keypress keydown keyup',function(){
            if (!$(this).val().match($regexname)) {
             // there is a mismatch, hence show the error message
               // $('#errN').removeClass('hidden');
                $('#errPN').addClass('err');
                $('#errPN').html('<i class="fa fa-warning"></i> Please Enter a valid name')
                $('#errPN').show();
            }
          else{
               // else, do not display message
               $('#errPN').addClass('valid');
               $('#errPN').html('<i class="fa fa-check-circle"></i> Valid Name')
              }
        });

        //validate Phone Number
        $('#phoneno').on('keypress keydown keyup',function(){
            if (!$(this).val().match($regexPhone)) {
             // there is a mismatch, hence show the error message
               // $('#errN').removeClass('hidden');
                $('#errP').addClass('err');
                $('#errP').html('<i class="fa fa-warning"></i> Please Enter a valid Valid Phone Number')
                $('#errP').show();
            }
          else{
               // else, do not display message
               $('#errP').addClass('valid');
               $('#errP').html('<i class="fa fa-check-circle"></i> Valid Phone Number')
              }
        });

        $('#p_phone').on('keypress keydown keyup',function(){
            if (!$(this).val().match($regexPhone)) {
             // there is a mismatch, hence show the error message
               // $('#errN').removeClass('hidden');
                $('#errW').addClass('err');
                $('#errW').html('<i class="fa fa-warning"></i> Please Enter a valid Valid Phone Number')
                $('#errW').show();
            }
          else{
               // else, do not display message
               $('#errW').addClass('valid');
               $('#errW').html('<i class="fa fa-check-circle"></i> Valid Phone Number')
              }
        });
        
        
$('#addStudent').click(function(e){
    e.preventDefault();
    let surname = $('#surname').val();
    let othername = $('#othername').val();
    let email = $('#email').val();
    let phoneno = $('#phoneno').val();
    let p_phone = $('#p_phone').val();
    let matricno = $('#matricno').val();

    let dept = $('#dept').val();
    let level = $('#level').val();
    let gender = $('#gender').val();
    let dob = $('#dob').val();
    let fullname = $('#fullname').val();
    let p_address = $('#p_address').val();
    let relationship = $('#relationship').val();


    if(!matricno || !surname || !email || !othername || !phoneno || !gender || !dept || !fullname || !dob){
        alert('Required field are yet complete')
        $('#error').addClass('err');
                $('#error').html('<i class="fa fa-warning"></i> Required Fields is left empty.')
                $('#error').show();
        return false;
    }
    else{
       //alert(firstName+lastName+email+phoneNo+wphoneNo+period)
       $.ajax({
        method: 'POST',
        url: 'includes/addstudent.php',
        dataType: 'JSON',
        data: {
            surname,othername, email, phoneno ,p_phone, matricno,dept ,level,gender,dob,fullname ,p_address,relationship },
        beforeSend: function(){
            $('#addStudent').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> Saving...')
        },
        success: function(data){
            setTimeout(()=>{
                if(data.status === 1){
                    $('#addStudent').html('<i class="fa fa-check-circle"></i> Saved')
                       alert('Record Saved')
                       
                  }else{
                    alert('Error Saving Record, Try again')
                    $('#addStudent').html('<i class="fa fa-save"></i> Save Record')
          } 
            
          },2000)
           
        }
    });
    }
})


//go button
$('#go').click(function(e){
    e.preventDefault()
    let matNo = $('#matNo').val();

    if(matNo === ""){
        toastr.error('You have not enter matric number', 'Missing Parameter!')
        return false
    }
    else{
        $.ajax({
            method: 'POST',
            url: 'includes/getStudent.php',
            dataType: 'JSON',
            data: {matNo},
            beforeSend: function(){
                $('#go').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> Please Wait...')
            },
            success: function(data){
                console.log(data);
                setTimeout(()=>{
                    if(data.status === 1){
                        $('#go').html('<i class="fa fa-chevron-circle-right"></i> Go')
                           $('#fName').val(data.surname+' '+data.othername)
                           $('#lev').val(data.level)
                           $('#depart').val(data.department)
                           $('.content').fadeIn(1500);
                           
                      }else{
                        toastr.error('No Record Found for your request', 'Invalid MatricNo!')
                        $('#go').html('<i class="fa fa-chevron-circle-right"></i> Go')
              } 
                
              },2000)
               
            }
        });
    }

})

$('#save_acc').click(function(e){
    e.preventDefault()
    let matNo = $('#matNo').val();
    let gpa = $('#gpa').val();
    let level = $('#lev').val() 
    let semester = $('#semester').val() 

    if(matNo === ""){
        toastr.error('Enter matric number, and click GO', 'Missing Parameter!')
        return false
    }else if(gpa === ""){
        toastr.error('You have not update student GPA', 'Missing Parameter!')
        return false
    }
    else{
        $.ajax({
            method: 'POST',
            url: 'includes/add_acc.php',
            dataType: 'JSON',
            data: {matNo,gpa,level,semester},
            beforeSend: function(){
                $('#save_acc').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> Please Wait...')
            },
            success: function(data){
                console.log(data);
                setTimeout(()=>{
                    if(data.status === 1){
                        $('#save_acc').html('<i class="fa fa-save"></i> Save Record')
                        toastr.success(data.msg, 'Record Saved')    
                      }else if(data.status === 0){
                        toastr.error('You have already save student accademic result, click update', 'Already Saved')
                        $('#save_acc').html('<i class="fa fa-save"></i> Save Record')
                        $('#update_acc').show()
              } else{
                toastr.error('Error Saving Record', 'Error')
                $('#save_acc').html('<i class="fa fa-save"></i> Save Record')
              }
                
              },2000)
               
            }
        });
    }

})


$('#update_acc').click(function(e){
    e.preventDefault()
    let matNo = $('#matNo').val();
    let gpa = $('#gpa').val();
    let level = $('#lev').val() 
    let semester = $('#semester').val() 

    if(matNo === ""){
        toastr.error('Enter matric number, and click GO', 'Missing Parameter!')
        return false
    }else if(gpa === ""){
        toastr.error('You have not update student GPA', 'Missing Parameter!')
        return false
    }
    else{
        $.ajax({
            method: 'POST',
            url: 'includes/update_acc.php',
            dataType: 'JSON',
            data: {matNo,gpa,level,semester},
            beforeSend: function(){
                $('#update_acc').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> Please Wait...')
            },
            success: function(data){
                console.log(data);
                setTimeout(()=>{
                    if(data.status === 1){
                        $('#update_acc').html('<i class="fa fa-edit"></i> Update Record')
                        toastr.success(data.msg, 'Record Updated')    
                      } else{
                toastr.error('Error Updating Record', 'Error')
                $('#update_acc').html('<i class="fa fa-edit"></i> Update Record')
              }
                
              },2000)
               
            }
        });
    }

})



//save_rem
$('#save_rem').click(function(e){
    e.preventDefault()
    let matNo = $('#matNo').val();
    let details = $('#details').val();
    let remark = $('#remark').val()

    if(matNo === ""){
        toastr.error('Enter matric number, and click GO', 'Missing Parameter!')
        return false
    }else if(details === "" ||remark===""){
        toastr.error('You have not enter require information', 'Missing Parameter!')
        return false
    }
    else{
        $.ajax({
            method: 'POST',
            url: 'includes/add_remark.php',
            dataType: 'JSON',
            data: {matNo,details,remark},
            beforeSend: function(){
                $('#save_rem').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> Please Wait...')
            },
            success: function(data){
                console.log(data);
                setTimeout(()=>{
                    if(data.status === 1){
                        $('#save_rem').html('<i class="fa fa-save"></i> Save Record')
                        toastr.success(data.msg, 'Record Saved')    
                      }else if(data.status === 0){
                        toastr.error('This remark has been added before.', 'Already Saved')
                        $('#save_rem').html('<i class="fa fa-save"></i> Save Record')
                        
              } else{
                toastr.error('Error Saving Record', 'Error')
                $('#save_rem').html('<i class="fa fa-save"></i> Save Record')
              }
                
              },2000)
               
            }
        });
    }

})
//track students
$('#track').click(function(e){
    e.preventDefault()

    let matNo = $('#matNo').val();
   
    if(matNo === ""){
        toastr.error('Enter matric number, and click Track', 'Missing Parameter!')
        return false
    }
    else{
        $.ajax({
            method: 'POST',
            url: 'includes/track_record.php',
            dataType: 'JSON',
            data: {matNo},
            beforeSend: function(){
                $('#searching').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> Tracking, Please Wait...')
            },
            success: function(data){
                console.log(data);
                setTimeout(()=>{
                    if(data.status === 1){
                        $('#searching').html('<i class="fa fa-check-circle"></i> 1 record match your search')
                        $('#searching').addClass('success')
                        $('.tracked').fadeIn(500);
                        $('#matno').html(data.matno);
                        $('#fname').html(data.surname+' '+data.othername);
                        $('#gender').html(data.gender);
                        $('#dob').html(data.dob);
                        $('#phone').html(data.phoneno);
                        $('#email').html(data.email);
                        $('#address').html(data.address);
                        $('#department').html(data.department);
                        $('#level').html(data.level);
                        $('#name').html(data.parent_name);
                        $('#relation').html(data.relationship);
                        $('#pAddress').html(data.parent_address);
                        $('#pPhone').html(data.parent_phoneno);
                        $('.accademic').html(data.output); 
                        $('.extra').html(data.outputs); 
                      }else if(data.status === 0){
                        $('.tracked').hide();
                        $('#searching').html('<i class="fa fa-exclamation-circle"></i> No record match your search')
                        $('#searching').addClass('danger')
              } else{
                toastr.error('Error Saving Record', 'Error')
                $('#save_rem').html('<i class="fa fa-save"></i> Save Record')
              }
                
              },2000)
               
            }
        });
    }

  
})
//Login button
$('#login').click(function(e){
    e.preventDefault();

    let username = $('#username').val();
    let password = $('#password').val();
   // console.log(username,password);
    if(username === ""){
        toastr.error('You have not enter Username', 'Missing Parameter!')
        return false
    }
    else if(password === ""){
        toastr.error('You have not enter Password', 'Missing Parameter!')
        return false
    }
    else{
        $.ajax({
            method: 'POST',
            url: 'includes/login.php',
            dataType: 'JSON',
            data: {username,password},
            beforeSend: function(){
                $('#login').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> Login-in...')
            },
            success: function(data){
                console.log(data);
                setTimeout(()=>{
                    if(data.status === 1){
                        $('#login').html('<i class="fa fa-check"></i> Login Successfully!')
                        toastr.success(data.msg, 'Login Success');
                       // window.location.replace('dashboard.php') 
                       window.location.href="dashboard.php";
                      console.log(data.msg)
                      } else{
                        toastr.error('Invalid Login Parameters', 'Login Error')
                        $('#login').html('<i class="fa fa-exclamation"></i> Login Error')
              }
                
              },2000)
               
            }
        });
    }
})

$('#level').change(function(e){
    //e.preventDefault()
    let level = $(this).val()
    let department = $('#department').val()
   
    if(!level || level==='Select Level'){
        toastr.error('Please select a level','Missing Field')
    }else if (!department || department==='Select Department'){
        toastr.error('Please choose a department','Missing Field')
    }else{
        $.ajax({
            method: 'POST',
            url: 'includes/getMatric.php',
           // dataType: 'JSON',
            data: {
                level, department },
            beforeSend: function(){
                $('#getMat').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> wait...')
            },
            success: function(data){
                console.log(data);
                setTimeout(()=>{
                        $('#getMat').html('');
                        $(data).appendTo('#matricNo')
              },2000)
               
            }
        });
    }
})

})