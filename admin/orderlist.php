<?php
session_start();
require_once "partials/navbar.php";
require_once "../business/classes/Business.php";
require_once "../business/classes/Product.php";



$business = null;
if(isset($_SESSION['biz_id'])){
  $biz_id = $_SESSION['biz_id'];
  $biz2 = new Business();
  $business = $biz2 -> fetch_business_details($biz_id);
}


$prod = new Product();
$product = $prod->get_orders();


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Admin Photo Change -->
            <div class="sidebar-brand-text mx-3">
                <img src="icons/business.png" class="img-fluid rounded-circle mt-2" alt="">
            </div>
           

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <button class="btn btn-sm " style="color:white; background-color:#FF632D; font-weight:bold;">Change Admin Photo</button>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>ADMIN PROFILE</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Activity Log
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="add_category.php" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Add Category</span>
                </a>
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
                        <a class="collapse-item" href="vendors_list.php">View All Businesses</a>
                        <a class="collapse-item" href="users_list.php">View ALL Customers</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Add Products -->
            <li class="nav-item">
                <a class="nav-link" href="add_product.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Add Business</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="admin_logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log out</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid my-5">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="vendors_list.php"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">All vendors
                                            </div></a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">80</div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="users_list.php"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Registered Users
                                            </div></a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">200</div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="add_category.php"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Add Category
                                            </div></a>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="row">

                        <!-- Form Area -->
                        <div class="col-xl-10 col-lg-7">
                            <div class="card mb-4">
                            <div class="card-header py-3">
                            <h4 style="color: #4676F7; font-weight:bold;">ORDER LIST</h4>
                            </div>
                            </div>
                            <!-- Add product form start here -->
                            <div class="col-md-12 mb-4">
                            <div class="card mb-4 ">
                            <div class="card-header py-3">
                                <h5 class="mb-0">All Order Records</h5>
                            </div>
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <strong>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Phone</th>  
                            <th scope="col">Order Date</th>
                            <th scope="col"></th>

                                </strong>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- This is done to create and increase a book numbering -->
                        <?php $num = 1; ?>
                        <?php foreach($product as $prodt){ ?>
                            <tr>
                            <th scope="row"><?php echo $num++; ?></th>
                            <!-- To make the fieds dynamic -->
                            <td><?php echo $prodt['order_custname']; ?></td>   
                            <td><?php echo $prodt['order_custaddress']; ?></td> 
                            <td><?php echo $prodt['order_qty']; ?></td>
                            <td id="td_call"><?php echo $prodt['order_custphone']; ?></td>
                            <td><?php echo $prodt['order_date']; ?></td>
                            <td>
                            <form action="process/delete_ord.php" method="post">
                                <input type="hidden" name="order_id" value="<?php echo $prodt['order_id']; ?>">
                                <button type="submit" style="background-color:red; border: red; padding: 5px; border-radius: 6%; color: white;" classs=" btn-sm btn-danger deletebtn" name="delete_btn"><i class='fa fa-trash'></i> delete order</button>
                            </form> &nbsp;
                            </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                            </div>
                            </div>
                        </div>
                    </div>

                       
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
                <div class="modal-body">Are you sure you want to log out?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

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