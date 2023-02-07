<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Qrcode</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <!-- <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p> -->
              <a href="https://www.bootstrapdash.com/product/star-admin-pro/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/star-admin-pro/"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <?php
       //db connect
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "employee";
    
        // Create connection
         $conn = mysqli_connect($servername, $username, $password, $dbname);
    
         // Check connection
          if(!$conn) 
          {
            die("Connection failed: " . mysqli_connect_error());
          }
          $email = $_SESSION['email'];

          $query = "SELECT * FROM user WHERE email = '$email'";
          $data = mysqli_query($conn,$query);
          $result = mysqli_fetch_assoc($data);
    ?>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Welcome<span class="text-black fw-bold"> <?php echo $result['fname']; ?><?php echo  $result['lname']; ?> </span></h1>
          </li>
        </ul>
       <ul class="navbar-nav ms-auto">
       
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> -->
            <img class="img-xs img-fluid rounded-circle w-auto " src="http://localhost/star-admin/template/img/<?php echo $result['image']; ?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
              <!-- <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> -->
              <img class="img-xs img-fluid rounded-circle w-auto " src="http://localhost/star-admin/template/img/<?php echo $result['image']; ?>">

              <p class="mb-1 mt-3 font-weight-semibold"> <?php echo $result['fname']; ?><?php echo  $result['lname']; ?> </p>
                <p class="fw-light text-muted mb-0"><?php echo $email;?></p>
              </div>
              
              <a href="http://localhost/star-admin/template/employeeprofile.php" name="update" target="_blank" class="dropdown-item">
                <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>
              
                <a class="dropdown-item" href="http://localhost/star-admin/template/uploadprofile.php" target="_blank">
                <i class="dropdown-item-icon mdi mdi-briefcase-upload text-primary me-2"></i>upload profile</a>
              
              <form action="http://localhost/star-admin/template/pages/samples/emplogout.php" method="post">
              <button type="submit" name="logout_btn" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Logout</button>
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="employees.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="">
              <i class="mdi mdi-qrcode menu-icon"></i>
              <span class="menu-title">QR Code generate</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="http://localhost/star-admin/template/emptables.php" target="_blank">Employees</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
    
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                   <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">QR code generator</button>
                  </li>
                
                 <!-- <li class="nav-item" role="presentation">
                  <button class="nav-link" id="img-tab" data-bs-toggle="tab" data-bs-target="#img" type="button" role="tab" aria-controls="img" aria-selected="false">Change profile</button>
                 </li> -->
               </ul>

                  <div>
                    <div class="btn-wrapper">
                    <div class="btn-group">
                   <button type="button" class="btn btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="icon-share "></i> share</button>
                 </button>
                 <div class="dropdown-menu">
                       <!-- copy link button -->
                       <a class="dropdown-item" href="https://www.addtoany.com/add_to/copy_link?linkurl=http%3A%2F%2Flocalhost%2Fstar-admin%2Ftemplate%2Fqrcode.php&amp;linkname=" target="_blank">
                        <i class="fa-regular fa-copy"></i> Copy Link</a>

                      <!-- save pages -->
                       <!-- <a class="dropdown-item" href="" save>
                        <i class="fa-regular fa-file-export"></i> Save pages us</a> -->

                        <div class="dropdown-divider">share link into </div>
                        <!-- share email -->
                        <a class="dropdown-item" href="https://www.addtoany.com/add_to/email?linkurl=http%3A%2F%2Flocalhost%2Fstar-admin%2Ftemplate%2Fqrcode.php&amp;linkname="><i class="fa-solid fa-envelope"></i> Email</a>
                          <!-- share whatsapp -->
                         <a class="dropdown-item" href="https://www.addtoany.com/add_to/whatsapp?linkurl=http%3A%2F%2Flocalhost%2Fstar-admin%2Ftemplate%2Fqrcode.php&amp;linkname=" target="_blank" >
                            <i class="fa-brands fa-whatsapp green"></i> Whatsapp</a> 
                            <!-- share facebook -->
                            <a href="https://www.addtoany.com/add_to/facebook?linkurl=http%3A%2F%2Flocalhost%2Fstar-admin%2Ftemplate%2Fqrcode.php&amp;linkname=" target="_blank" style="text-decoration:none; margin-left:15px;" > 
                                  <i class="fa-brands fa-facebook"></i> Facebook</a>

                        </div>
                   </div>
                      <a href="" class="btn btn-otline-dark" onclick="window.print()"><i class="icon-printer"></i> Print</a>
                      <a href="http://localhost/star-admin/template/qrcode.php?path=qrcode.pdf" download class="btn btn-primary text-white me-0">
                        <i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
                <style>
    /* *{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: 'Poppins';
}

body{
  width: 100%;
  height: 100vh;
  background-color: blue;
  display: flex;
  align-items: center;
  justify-content: center;
} */

/* .container{
  background-color: #fff;
  width: 100%;
  height: 100;
  border-radius: 5px;
  padding: 20px ;
  transition: .1s;
  box-shadow: 5px 5px 5px 5px;
 margin-top: 50px;
} */

/* .header h1{
  font-size: 23px;
  font-weight: 500;
  margin-bottom: 5px;
  align-items: center;
  text-align: center;
  padding: 5px 0 5px 0 ;
  background-color: blue;
  color:white;
} */


.inp{
  width: 100%;
  height: 50px;
  outline: none;
  border-radius: 5px;
  margin-left:320px;
}

button{
  border: none;
  cursor: pointer;
}

input{
  padding-left: 15px;
  margin-bottom: 15px;
  font-size: 15px;
}

.qr-code{
  padding: 10px 0;
  /* border: 1px solid #ccc; */
  margin-top: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 4px;
  opacity: 0;
  pointer-events: none;
  transition: .5s;
}

.container.active{
  height: 490px;
}

.container.active .qr-code{
  opacity: 1;
  pointer-events: auto;
}
  </style>
  <?php
       //db connect
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "employee";
    
        // Create connection
         $conn = mysqli_connect($servername, $username, $password, $dbname);
    
         // Check connection
          if(!$conn) 
          {
            die("Connection failed: " . mysqli_connect_error());
          }
          $email = $_SESSION['email'];

          $query = "SELECT * FROM user WHERE email = '$email'";
          $data = mysqli_query($conn,$query);
          $result = mysqli_fetch_assoc($data);
    ?>
    <?php
                              if(isset($_GET['id']))
                              {
                                $id = $_GET['id'];
                                $users = "SELECT * FROM user WHERE id= '$id' ";
                                $users_run = mysqli_query($conn ,$users);

                                if(mysqli_num_rows($users_run)>0)
                                {
                                    foreach($users_run as $row)
                                    {
                                      ?>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
  <title>qrcode</title>
</head>
<body> 
  <div class="container card card-lg w-100 h-100vh mt-2 mb-5" style="margin-top:50px;">
    <div class="header text-center mb-4">
      <h5 class="card-title bg-primary text-white p-4 mt-4 fs-4">QR Code Generator</h5>
      <p class="bg-primary w-50 text-center text-white p-3 font-weight-bold fs-5" style="margin-left:320px;">Type a url or text to generate QR Code</p>
    </div>
    <div class="input-form">
      <input type="hidden"  class="qr-input inp form-control" placeholder="Enter url or text" style="width:50%" value=<?= $row['fname'];?>>
      <input type="hidden"  class="qr-input1 inp form-control" placeholder="Enter url or text" style="width:50%" value=<?= $row['lname'];?>>
      <input type="hidden"  class="qr-input2 inp form-control" placeholder="Enter url or text" style="width:50%" value=<?= $row['age'];?>>
      <input type="hidden"  class="qr-inputs3 inp form-control" placeholder="Enter url or text" style="width:50%" value=<?= $row['gender'];?>>
      <input type="hidden"  class="qr-inputs4 inp form-control" placeholder="Enter url or text" style="width:50%" value=<?= $row['email'];?>>
      <input type="hidden"  class="qr-inputs5 inp form-control" placeholder="Enter url or text" style="width:50%" value=<?= $row['status'];?>>
      <input type="hidden"  class="qr-inputs6 inp form-control" placeholder="Enter url or text" style="width:50%" value=<?= $row['image'];?>>

      <button class="generate-btn inp btn-success font-weight-bold" style="width:50%;">Generate QR Code</button>
    </div>
    <div class="qr-code">
      <img src="./qrcode.png" class="qr-image">
    </div>
  </div>
  <?php  
        }
     }
      else
      {
   ?>
  <h3>No records</h3>
  <?php
     }
   }
  ?>
  
  <script>
    var container = document.querySelector(".container");
    var generateBtn = document.querySelector(".generate-btn");
    var qrInput = document.querySelector(".qr-input");
    var qrInput1 = document.querySelector(".qr-input1");
    var qrInputs2 = document.querySelector(".qr-input2");
    var qrInputs3 = document.querySelector(".qr-inputs3");
    var qrInputs4 = document.querySelector(".qr-inputs4");
    var qrInputs5 = document.querySelector(".qr-inputs5");
    var qrInputs6 = document.querySelector(".qr-inputs6");

    var qrImg = document.querySelector(".qr-image");

    generateBtn.onclick = function () {      
      if(qrInput.value.length > 0){ 
        generateBtn.innerText = "Generating QR Code..."       
        qrImg.src = "https://api.qrserver.com/v1/create-qr-code/?size=170x170&data="
        + " First Name : " + qrInput.value 
        + " Last Name : "  + qrInput1.value  
        + " Age : "        + qrInputs2.value  
        + " Gender : "     + qrInputs3.value 
        + " Email : "      + qrInputs4.value
        + " Status : "     + qrInputs5.value 
        + " Image : "      + qrInputs6.value;
      
        // console.log(qrImg.src);
        qrImg.onload = function () {
          container.classList.add("active");
          generateBtn.innerText = "Generate QR Code";
        }
      }
    }
  </script>
  
<!-- tabination closed -->
<!-- <script>
  const btn = document.querySelector(".button");

btn.classList.add("button--loading");
setTimeout( 
function(){  
btn.classList.remove("button--loading");
}, 5000);
</script> -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

</body>

</html>

