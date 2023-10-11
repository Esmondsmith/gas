<?php
session_start();
require_once "partials/navbar.php";

// print_r($_SESSION);



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="user_assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="user_assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="user_assets/css/styles2.css" rel="stylesheet" type="text/css">
    <link href="user_assets/animate.css" rel="stylesheet" type="text/css">

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
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>

                                    <?php
                                        if(isset($_SESSION['login_error'])){
                                    ?>
                                    <p class="text-danger text-center bg-white"><?php echo $_SESSION['login_error']; ?></p>
                                            <!-- unset is used to stop the script -->
                                        <?php unset($_SESSION['login_error']); ?>
                                    <?php
                                        }
                                    ?>

                                    <!-- *********LOGIN STARTS HERE************ -->
                                    <form action="process/user_login_process.php" method="post">
                                        <div class="form-group">
                                            <input type="email" name="login_email" class="form-control form-control-user" id="email" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="login_password" class="form-control" id="pass" placeholder="Enter Password">
                                        </div>
                                        <button type="submit" name="login_btn" class="btn btn-primary btn-block mb-4">
                                            Login</button>
                                    </form>
                                        <div class="text-center mb-2">
                                         <b>Don't have an Account? Register</b>
                                        </div>
                                        <a href="business/business_reg.php" class="btn btn-success btn-user btn-block mb-2">
                                            As a Business
                                        </a>
                                        <a href="user_register.php" class="btn btn-info btn-user btn-block mb-2">
                                            As a User
                                        </a>
                                        <hr>
                                        
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


</body>
</html>
