
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>add employee</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" >
  <style>
    .error{
        color:red;
        
    }
  </style>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
             <!-- res save message -->
          <?php if(isset($_SESSION['message'])) 
          {
            ?>
            <div class="alert alert-warning alert-dismissible fade show">
            <i class="bi-exclamation-triangle-fill"></i>
                  <strong>Warning!</strong><?php  echo $_SESSION['message']; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
            <?
            //echo $_SESSION['message'];
            unset($_SESSION['message']);
          }
          
          ?>
         <div class="container-fluid-col-4">        
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg ">
              <div class="card auth-form-light text-left py-3 px-3 px-sm-5" style="">
                <div class="card-body">
                  <h4 class="card-title text-uppercase text-center ">Add employee</h4>
                 
                  <form id="register_form" name="register_form" method="post" action="insertdata.php">

                  <div class="form-group mb-3">
                      <label for="fname">First Name <i class="text-danger">*</i></label>
                      <input type="text" class="form-control" id="fname" name="fname" placeholder="enter your first name">
                      <p id="error_fname" class=""></p>
                    </div>

                    <div class="form-group mb-3">
                      <label for="lname">Last Name <i class="text-danger">*</i></label>
                      <input type="text" class="form-control" id="lname" name="lname" placeholder="enter your last name">
                      <p id="error_lname"></p>
                    </div>

                    <div class="form-group mb-3">
                      <label for="age">Age <i class="text-danger">*</i></label>
                      <input type="number" class="form-control" id="age" name="age" placeholder="enter your age">
                      <p id="error_age"></p>
                    </div>

                    <div class="form-group mb-3">
                      <label for="gender">Gender <i class="text-danger">*</i></label>
                      <p>
                       <span>Male </span> <input type="checkbox" class="male" value="male" name="gender" id="gender">
                       <span>Female</span> <input type="checkbox"  class="female" value="female" name="gender" id="gender">
                     </p>
                    </div>
                    
                    <div class="form-group mb-3">
                      <label for="email">Email <i class="text-danger">*</i></label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="enter your email">
                      <p id="error_email"></p>
                    </div>

                    <div class="form-group mb-3">
                      <label for="password">Password <i class="text-danger">*</i></label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="enter your password">
                      <p id="error_password"></p>
                    </div>

                    <div class="form-group mb-3">
                      <label for="cpassword">Repeat Password <i class="text-danger">*</i></label>
                      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="enter your repeat password">
                      <p id="error_cpassword"></p>
                    </div>
                  
                 
                    <!-- <div class=" row"> -->
                      <button type="submit" class="btn btn-primary  mt-3"  id="submit" style ="width:40%;" >Submit</button>
                      <a href="http://localhost/star-admin/template/emptables.php" type="button" class="btn ml-5 mt-3 bg-secondary btn-light text-white"  id="" style ="width:40%; margin-left:50px;">Cancel</a>
                   <!-- </div> -->

                  </form>
                </div>
              </div>
            </div>
 
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.js"></script>



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <!-- plugins:js -->
  <!-- <script src="../../vendors/js/vendor.bundle.base.js"></script> -->
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script> -->
  <!-- endinject -->  

<script>
    $(document).ready (function () {  

  
  $('form[id="register_form"]').validate({  
    rules: {  
      fname: 'required',  
      lname: 'required', 
      age:{
         required: true,
         number:true,
      },
      gender:'required',

      email: {  
        required: true,  
        email: true,  
      },  
      password: {  
        required: true,  
        minlength: 5,  
      },
      cpassword: {  
        required: true,  
        minlength: 5, 
        equalTo: "#password" 
      }  
    },  
    messages: {  
      fname: 'please enter your first name',  
      lname: 'please enter your last name',  
      age: 'please enter your age',
      gender: 'Please choose gender',
      email: 'Enter a valid email',  
      password: {  
        minlength: 'Password must be at least 5 characters long'  
      }, 
      cpassword: {  
        minlength: 'Password must be at least 5 characters long'  
      } 
    },  
    submitHandler: function(form) {  
      form.submit();  
    }  
  });  
 });  
</script>

</body>
</html>