<?php
    session_start();
    require_once "guards/guard.php";
    require_once "partials/navbar.php";
    require_once "classes/User.php";
    

    if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    $userr = new User();
    $user = $userr->fetch_user_details($user_id);

    //   echo "<pre>";
    //   print_r($user);
    //   echo "</pre>";

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
           

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <button class="btn btn-sm align-center" style="color:white; background-color:#FF632D; font-weight:bold;">Change Profile Photo</button>
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
                        <a class="collapse-item" href="buttons.html">Edit Profile</a>
                        <a class="collapse-item" href="cards.html">Change password</a>
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
                        <a class="collapse-item" href="table.php">What's New</a>
                        <a class="collapse-item" href="#">View Vendors</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="user_logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log out</span></a>
            </li>
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
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php// echo $user['user_fullname']; ?></h1>
                    </div>

                    <div class="col-md-9 mb-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                        <h5 class="mb-0">ADD PROFILE PICTURE</h5>
                        </div>
                        <div class="card-body" style="min-height:200px">
                        <!-- upload form -->
                            <form action="process/user_uploadprocess.php" method="post" enctype="multipart/form-data">
                                <label class="my-2">Change profile picture</label>
                                <input type="file" id="uploadform" name="profile" class="form-control my-3">
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                <button class="btn btn-primary my-2" name="btnupload">Change</button>
                            </form>
                        </div>
                    </div>
                    </div>
            </div>

            <!-- End of Main Content -->

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

</body>

</html>