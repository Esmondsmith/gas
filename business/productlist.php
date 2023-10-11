<?php
session_start();
require_once "partials/navbar.php";
require_once "classes/Business.php";
require_once "classes/Product.php";

$business = null;
if(isset($_SESSION['biz_id'])){
  $biz_id = $_SESSION['biz_id'];
  $biz2 = new Business();
  $business = $biz2 -> fetch_business_details($biz_id);

//   echo "<pre>";
//   print_r($_SESSION);
//   echo "</pre>";
}

// $prodt = new Product();
// $product = $prodt->fetch_biz_products($product_biz_id);

// require_once "classes/Product.php";
$prod = new Product();
$product = $prod->fetch_all_products();

?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">
                <?php 
                    if ($business !== null) { echo $business['biz_name']; } 
                    ?>
                </div>
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

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log out</span></a>
            </li>
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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php 
                                
                                if ($business !== null) {
                                    // Access $biz['biz_name'] and $biz['biz_img'] safely
                                    echo $business['biz_name'];
                                }
                                
                                ?></span>
                                <img src="uploads/<?php echo $business['biz_img']; ?>" class="img-profile rounded-circle">
                                   
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                        
                        </li>                    

                    </ul>

                </nav>
             
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                        <?php 
                        if ($business !== null) { echo $business['biz_name']; } 
                        ?>
                    </div>
                        </h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Form Area -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card mb-4">
                            <div class="card-header py-3">
                            <h4 style="color: #4676F7; font-weight:bold;">PRODUCT LIST</h4>
                            </div>
                            </div>
                            <!-- Add product form start here -->
                            <div class="col-md-9 mb-4">
                            <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Product Lists</h5>
                            </div>
                            <div class="card-body" style="min-height:200px">
                                <a href="add_product.php" class="btn btn-success">Add New Product</a>
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <strong>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>  
                            <th scope="col">Delete &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Edit</th>
                                </strong>
                            </tr>
                        </thead>
                        <tbody>
                                    <!-- This is done to create and increase a book numbering -->
                        <?php $num = 1; ?>
                        <?php foreach($product as $prodt){ ?>
                            <tr>
                            <th scope="row"><?php echo $num++; ?></th>
                            <!-- To make the fieds heading dynamic -->
                            <td><?php echo $prodt['product_name']; ?></td>    
                            <td><?php echo $prodt['product_desc']; ?></td>
                            <td style="display:flex";>
                                
                            <form action="process/deleteprod_process.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $prodt['product_id']; ?>">
                                <button type="submit" style="background-color:red; border: red; padding: 7px; border-radius: 6%; color: white;" classs=" btn-md btn-danger deletebtn" name="delete_btn"><i class='fa fa-trash'></i> delete</button>
                            </form>
                                <!-- Below, we are using query string to pass the id of book while editing -->
                                <a href="editproduct.php?id=<?php echo $prodt['product_id']; ?>" class='btn btn-md btn-success mx-3'><i class='fa fa-edit'>&nbsp</i> Edit</a>
                                &nbsp;&nbsp;
                                <a href='#' class='btn btn-sm btn-info'><i class='fa fa-list'></i> Details</a>
                                &nbsp;&nbsp;
                                
                            </td>
                            </tr>

                        <?php } ?>

                        </tbody>
                        </table>

                            </div>
                            </div>
                        </div>
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
                                            <i class="fas fa-circle text-primary"></i> Large Quantity
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Few Quantity
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Out of stock
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