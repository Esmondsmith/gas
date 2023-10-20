<?php
session_start();
require_once "partials/navbar.php";
require_once "classes/User.php";
// require_once "guards/guard.php";

if(isset($_GET['id'])){
  $user_id = $_GET['id'];
  if(!is_numeric($user_id)){
    header("location:user_profile.php");
    exit();
  }

  $users = new User();
  $user = $users->get_user($user_id);
  // print_r($user);
  //if no user exist with the id they entered, redirect them away.
  if(!$user){
    header("location:user_profile.php");
    exit();
  }

} 


$user = null;  
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  $userr = new User();
  $user = $userr -> fetch_user_details($user_id);
}


?>

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Profile Image -->
   
    <div class="sidebar-brand-text mx-3">
        <img src="uploads/<?php echo $user['user_img']; ?>" class="img-fluid rounded-circle mt-2" alt="">
    </div>
    <li class="nav-item active">
        <a class="nav-link" href="user_upload.php">
            <button class="btn btn-sm align-center" id="Change_Photo" style="color:white; background-color:#FF632D; font-weight:bold;">Change Profile Photo</button>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Activity Log
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Edit Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Edit:</h6>
                <a class="collapse-item" href="user_upload.php">Edit Profile</a>
                <a class="collapse-item" href="#">Change password</a>
            </div>
        </div>
    </li>

    <!-- Views -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Views</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">View:</h6>
                <a class="collapse-item" href="#">What's New</a>
                <a class="collapse-item" href="vendors.php#user_profile">View Vendors</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="user_login.php" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Log out</span></a>
    </li>

    <!-- Divider -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <a href="user_profile.php"><button class="rounded-circle border-0" id="sidebarToggle"></button></a>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">                        
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['user_fullname']; ?></span>
                        <img src="uploads/<?php 
                        
                        if ($user !== null) {
                            echo $user['user_img'];
                        }
                        ?>" class="img-profile rounded-circle">
                    </a>
                </li>
            </ul>
        </nav>
      
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 ml-4 text-gray-800"><strong> Change Password,
                <?php
                    if ($user !== null) {
                        // Access $biz['biz_name'] and $biz['biz_img'] safely
                        echo $user['user_fullname'];
                    }
                ?>
                </strong></h1>
            </div>
            <div class="row w-50">
                    <!-- CHANGE PASSWORD START HERE -->
                    <form action="process\changepass_process.php" method="post" class="ml-4">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-2">
                                <input type="password" name="oldpass" value="" class="form-control form-control-user" id="oldpass" placeholder="Old Password">
                            </div>
                            <div class="col-sm-12 mb-3 mb-2">
                                <input type="password" name="newpass1" value="" class="form-control form-control-user" id="newpass1" placeholder="New Password">
                            </div>
                            <div class="col-sm-12 mb-3 mb-2">
                                <input type="password" name="newpass2" value="" class="form-control form-control-user" id="newpass2" placeholder="Repeat New Password">
                            </div>
                            <input type="hidden" name="user_id" value="">
                        <div class="col-sm-12 mb-3 mb-2">
                            <button class="form-control align-center form-control-user btn btn-primary btn-user btn-block" type="submit" name="passchange-btn">CHANGE</button>
                        </div>
                    </form> 
            </div>  <!-- End of Main Content -->
  

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Are you sure you want to log out?.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="user_login.php">Logout</a>
        </div>
    </div>
</div>
</div> <!-- Logout Modal End-->



    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; GazEasy 2023</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>


</div>
<!-- End of Page Wrapper -->



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="user_assets/vendor/jquery/jquery.min.js"></script>
<script src="user_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="user_assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="user_assets/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="user_assets/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="user_assets/js/demo/chart-area-demo.js"></script>
<script src="user_assets/js/demo/chart-pie-demo.js"></script>



</script>


</body>

</html>