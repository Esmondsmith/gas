<?php
session_start();
require_once "partials/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/styles2.css" rel="stylesheet" type="text/css">
    <link href="assets/animate.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="images/b22.jpg" alt="holding gas cylinder" height="100%" width="110%" >
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                                    </div>

                                    <?php
                                        if(isset($_SESSION['admin_error'])){
                                    ?>

                                    <p class="text-danger text-center bg-white"><?php echo $_SESSION['admin_error']; ?></p>
                                            <!-- unset is used to stop the script -->
                                            <?php unset($_SESSION['admin_error']); ?>

                                    <?php
                                        }
                                    ?>

                                    <!-- Admin login form -->
                                    <form action="process/admin_login_process.php" method="post" class="user">
                                        <div class="form-group">
                                            <input type="email" name="admin_email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="admin_password" class="form-control form-control-user"
                                                id="adminpass" placeholder="Password">
                                        </div>
                                        <button name="admin_btn" class="btn btn-primary btn-user btn-block mb-4">Login </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="medium" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
