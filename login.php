<?php
require_once("partials/header.php");
?>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <a href="index.php" class="btn btn-primary btn-user btn-block mb-4">
                                            Login
                                        </a>
                                        <div class="text-center mb-2">
                                         <b>Don't have an Account? Register</b>
                                        </div>
                                        <a href="vendor.php" class="btn btn-success btn-user btn-block mb-2">
                                            As a Vendor
                                        </a>
                                        <a href="register.php" class="btn btn-info btn-user btn-block mb-2">
                                            As a User
                                        </a>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="medium" href="forgot-password.php">Forgot Password?</a>
                                    <!-- </div>
                                    <div class="text-center">
                                        Do not have an Account?
                                    </div>
                                    <div class="text-center m">
                                    <div class="text-center">
                                        <a class="medium" href="vendor.php">As a Vendor!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="medium" href="register.php">As a User!</a>
                                    </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once("partials/footer.php");
?>