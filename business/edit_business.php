<?php
session_start();
error_reporting(E_ALL);

require_once "classes/Business.php";
require_once "partials/navbar.php";

//These are used for the select dropdown
require_once "classes/Type.php";
$type = new Type();
$biz_type = $type->fetch_business_type();
include_once "classes/Address.php";
$sta = new Address();
$states = $sta->fetch_all_states();
include_once "classes/Local.php";
$lg = new Local();
$locals = $lg -> fetch_local_govt();


//This is used to fetch out the Business details from DB
$biz = null;  // Initialize $biz to null
if(isset($_SESSION['biz_id'])){
  $biz_id = $_SESSION['biz_id'];
  $bz = new Business();
  $biz = $bz->fetch_business_details($biz_id);
}


//This is used to retain the old details before editing
if(isset($_GET['id'])){
    $biz_id = $_GET['id'];
    if(!is_numeric($biz_id)){
      header("location:business_profile.php");
      exit();
    }
    $bussiness = new Business();
    $biz = $bussiness->get_buiness($biz_id);
    // print_r($biz);
    //if no biz exist with the id they entered, redirect them away.
    if(!$biz){
      header("location:business_profile.php");
      exit();
    }
  } 


?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Profile Image -->
           
            <div class="sidebar-brand-text mx-3">
            <img src="uploads/<?php echo $biz['biz_img']; ?>" class="img-fluid rounded-circle mt-2">
            </div>
           

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="biz_uploadphoto.php">
                    <button class="btn btn-sm " style="color:white; background-color:#FF632D; font-weight:bold;">Change Profile Photo</button>
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
                        <h6 class="collapse-header">View Lists:</h6>
                        <a class="collapse-item" href="productlist.php">View Available Products</a>
                        <a class="collapse-item" href="#">View Customers List</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Add Products -->
            <li class="nav-item">
                <a class="nav-link" href="add_product.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Add Product</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="business_login.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log out</span></a>
            </li>

        </ul>

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php 
                                
                                if ($biz !== null) {
                                    // Access $biz['biz_name'] and $biz['biz_img'] safely
                                    echo $biz['biz_name'];
                                }
                                
                                ?></span>
                                <img src="uploads/<?php echo $biz['biz_img']; ?>" class="img-profile rounded-circle">
                                   
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="business_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="business_login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
             

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Welcome <?php 
                        
                        if ($biz !== null) {
                            // Access $biz['biz_name'] and $biz['biz_img'] safely
                            echo $biz['biz_name'];
                        }
                        
                        ?> !</h1>
                    </div>

                    <!-- Content Row -->
                        
                    <!-- Content Row -->

                    <!-- Business update form starts here -->
            <form action="process/edit_businessprocess.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    <div class="row g-3">
                    <div class="col-md-6">
                    <label for="biz-type" class="form-label"><b>Business Type</b></label>
                    <!-- select for business type start-->
                    <select id="biz-type" name="biz_type" class="form-select">
                    <?php foreach($biz_type as $type){ ?>
                        <option value="<?php echo $type['type_id']; ?>"> <?php echo $type['type_name']; ?> </option>
                        <?php  }?>
                    </select> 
                    <!-- select for business type end-->
                    </div>
                    <div class="col-sm-6">
                    <label for="biz-name" class="form-label"><b>Business Name</b></label>
                    <input type="text" value="<?php echo $biz['biz_name']; ?>" name="biz_name" class="form-control" id="biz-name">
                    <div class="invalid-feedback">
                        Valid Business name is required.
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <label for="biz-cert" class="form-label"><b>Business Reg. Certificate</b></label>
                    CAC Cert. Or Any Valid ID
                    <input type="file" name="biz_doc" class="form-control" id="biz-cert">
                    </div>
                    <div class="col-md-6">
                    <label for="biz-phone" class="form-label"><b>Contact Number</b></label>
                    <input type="number" value="<?php echo $biz['biz_phone']; ?>" name="biz_phone" class="form-control" id="biz-phone">
                    </div>
                    <div class="col-12">
                    <label for="address" class="form-label"><strong>Address</strong></label>
                    <input type="text" class="form-control" value="<?php echo $biz['biz_address']; ?>" name="biz_address" id="address" placeholder="Street/Building number">
                    </div>
                    <div class="col-12">
                    <label for="city" class="form-label"><strong>City</strong></label>
                    <input type="text" value="<?php echo $biz['biz_city']; ?>" name="biz_city" class="form-control" id="city" placeholder="City Name">
                    </div>
                    <!-- select for state start-->
                    <div class="col-sm-6">
                    <label value="">Select State</label>
                    <select class="form-control" name="state" id="stateid">                          
                    <?php foreach($states as $anything){?>
                    <option value="<?php echo $anything["state_id"]; ?>"><?php echo $anything["state_name"]; ?></option>
                    <?php } ?>
                    </select>
                    <!-- select for state end-->
                </div>               
                <div class="col-sm-6">   
                    <label value="">Select L.G.A</label>                     
                    <select class="form-control" name="lga" id="lgaid">
                    <?php foreach($locals as $lg){ ?>
                        <option value="<?php echo $lg['local_govt_id']; ?>"> <?php echo $lg['local_govt_name']; ?> </option>
                    <?php  }?>
                    </select> 
                </div>
                </div>
                <input type="hidden" name="biz_id" value="<?php echo $biz['biz_id'];  ?>">
                <hr class="my-3">
                <button name="updatebiz_btn" class="w-27 btn mb-2 btn-primary btn-lg" type="submit">Update</button>
            </form>
          <!-- Business update form ends here -->
                        <div class="row mt-4">
                            <div class="col"> 
                                <a href="business_profile.php"> << Back </a> 
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
                    <a class="btn btn-primary" href="business_login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function(){

        $("#stateid").change(function(){
            var stateid = $("#stateid").val();
            // alert(stateid);
            $("#lgaid").load("process/lga_process.php", {"statekey": stateid}, function(response, status, xhr){
            });

        });
                
        })

    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>