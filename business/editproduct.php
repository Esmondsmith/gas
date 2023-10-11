<?php
session_start();
require_once "partials/navbar.php";
require_once "classes/Product.php";
require_once "classes/Business.php";

if(isset($_SESSION['biz_id'])){
    $biz_id = $_SESSION['biz_id'];
  
    $bz = new Business();
    $biz = $bz -> fetch_business_details($biz_id);
}


if(isset($_GET['id'])){
    $product_id = $_GET['id']; 
    if(!is_numeric($product_id)){
      header("location:productlist.php");
      exit();
    }
    $pro = new Product();
    $product = $pro->get_prod_details($product_id);
    // print_r($product);
    //if no product exist with the id they entered, redirect them away.
    if(!$product){
      header("location:productlist.php");
      exit();
    }
  
} else {
header("location:productlist.php");
exit();
}
  

?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-smile"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $biz['biz_name'];?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
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
                <a class="nav-link" href="business_profile.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>My Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_product.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Add Product</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log out</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <a href="productlist.php"><button class="rounded-circle border-0" id="sidebarToggle"></button></a>
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
                </nav>
             
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $biz['biz_name'];?></h1>
                    </div>
                        
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Form Area -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card mb-4">
                            <div class="card-header py-3">
                            <h4 style="color: #4676F7; font-weight:bold;">UPDATE PRODUCT DETAILS</h4>
                            </div>
                            </div>
                            <!-- Edit product form start here -->
                    <form action="process/editprod_process.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col">
                            <div class="form-outline">
                                <input type="text" id="form7Example1" name="prod_name" class="form-control" value="<?php echo $product['product_name']; ?>"/>
                                <label class="form-label" for="form7Example1">Product Name</label>
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-outline">
                                <input type="number" id="form7Example1" name="prod_price" class="form-control" value="<?php echo $product['product_price']; ?>"/>
                                <label class="form-label" for="form7Example1">Product Price</label>
                            </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="txt_addprod" class="form-label">Product Description</label>
                            <textarea class="form-control" name="prod_desc" id="txt_addprod" rows="3"><?php echo $product['product_desc']; ?></textarea></textarea>
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id'];  ?>">
                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <button type="submit" name="addprod-btn" class="btn btn-primary btn-lg">Update</button>
                        </div>
                    </form>
                    <!-- Edit product form end here -->
                    </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Product Monitoring</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> New Product
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Old Product
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Out of Stock
                                        </span>
                                    </div>
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